<?php
/**
 * ilogachev@infomarketstudio.ru
 */

namespace common\modules\bot\components;

use common\modules\bot\models\Screens;
use common\modules\bot\models\ScreensSearch;
use Closure;

use common\components\Helper;
use common\models\Addmoyka;
use common\models\BenClients;
use TelegramBot\Api\Types\Inline\InlineKeyboardMarkup;
use TelegramBot\Api\Types\ReplyKeyboardMarkup;
use yii\base\Component;
use abei2017\emoji\Emoji;

require_once 'calendar.php';


class bot extends Component
{

    public $bot;
    public $botlog;

    /**
     * bot constructor.
     * @param string $token
     */
    public function __construct($bot)
    {




        $this->bot = $bot;
        \Yii::info("Init", 'chat');
        return true;
    }


    /**
     * @return mixed
     */
    public function Run()
    {
        \Yii::info("Run", 'chat');
        return true;
    }

    /**
     * @return bool
     */
    public function AddToLog()
    {
        \Yii::info("AddToLog", 'chat');
        $result = json_decode($this->bot->getRawBody());

        //Логируем входящий запрос
        $model = new \common\modules\bot\models\BotLog();
        $model->update_id = isset($result->update_id) ? $result->update_id : 0; // * @property integer $update_id
        $model->is_callback = isset($result->callback_query) ? 1 : 0; // * @property integer $is_callback
        if (isset($result->callback_query)) {
            $model->callback_query_id = $result->callback_query->id; // * @property integer $callback_query_id
            $model->callback_query_from_id = (string)$result->callback_query->from->id; // * @property integer $callback_query_from_id
            $model->callback_query_from_is_bot = $result->callback_query->from->is_bot ? "true" : "false"; // * @property string $callback_query_from_is_bot
            $model->callback_query_from_first_name = $result->callback_query->from->first_name; // * @property string $callback_query_from_first_name
            $model->callback_query_from_username = $result->callback_query->from->username; // * @property string $callback_query_from_username
            $model->callback_query_from_language_code = $result->callback_query->from->language_code; // * @property string $callback_query_from_language_code
            //  $model->callback_chat_instance=$result->callback_query->chat->chat_instance; // * @property integer $callback_chat_instance
            $model->callback_data = $result->callback_query->data; // * @property string $callback_data
        } else {
            $model->message_id = isset($result->message->message_id) ? $result->message->message_id : 0; // * @property integer $message_id
            $model->from_id = isset($result->message->from->id) ? $result->message->from->id : 0; // * @property integer $from_id
            $model->from_is_bot = isset($result->message->from->is_bot) ? (int)$result->message->from->is_bot : 1; // * @property integer $from_is_bot
            $model->from_first_name = isset($result->message->from->first_name) ? $result->message->from->first_name : ''; // * @property string $from_first_name
            $model->from_username = isset($result->message->from->username) ? $result->message->from->username : "empty"; // * @property string $from_username
            $model->from_language_code = isset($result->message->from->language_code) ? $result->message->from->language_code : "empty"; // * @property string $from_language_code
            $model->chat_id = isset($result->message->chat->id) ? $result->message->chat->id : 0; // * @property integer $chat_id
            $model->chat_first_name = isset($result->message->chat->first_name) ? $result->message->chat->first_name : 'empty'; // * @property string $chat_first_name
            $model->chat_username = isset($result->message->chat->username) ? $result->message->chat->username : "empty"; // * @property string $chat_username
            $model->chat_type = isset($result->message->chat->type) ? $result->message->chat->type : ''; // * @property string $chat_type
            $model->date = date("d.m.Y H:s:i", isset($result->message->date) ? $result->message->date : 0); // * @property string $date
            $model->text = isset($result->message->text) ? $result->message->text : ""; // * @property string $text
            $model->entities = isset($result->message->entities) ? json_encode($result->message->entities) : ""; // * @property string $entities

        }
        if (!$model->save()) {
            \Yii::info("AddToLog ERROR", 'chat');
            \Yii::info(print_r($model->getErrors(), true), 'chat');
        } else {
            $this->botlog = $model;
        }
        return true;
    }


    /**
     * @return bool
     */
    public function checkWebHook()
    {
        // \Yii::info("checkWebHook", 'chat');
        $pathTo = \Yii::getAlias('@frontend/runtime/');
        if (!file_exists($pathTo . "registered.trigger")) {
            /**
             * файл registered.trigger будет создаваться после регистрации бота.
             * если этого файла нет значит бот не зарегистрирован
             */

            // URl текущей страницы
            $page_url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            $result = $this->bot->setWebhook($page_url);
            if ($result) {
                file_put_contents($pathTo . "registered.trigger", time()); // создаем файл дабы прекратить повторные регистрации
                echo "Web hook установлен " . $pathTo;
                \Yii::info("Web hook установлен " . $pathTo, 'chat');
            }
        }
        return true;
    }


    /**
     * @return array|bool|null|\yii\db\ActiveRecord
     */
    public function getStartScreen()
    {
        \Yii::info("getStartScreen", 'chat');
        $screen = ScreensSearch::find()->where(['is_start' => 1])->one();
        if ($screen) {
            return $screen;
        }
        return false;
    }


    /**
     * @param $update
     * @return array|bool|null|\yii\db\ActiveRecord
     */
    public function findScreen($update, $data)
    {
        \Yii::info("findScreen ", 'chat');

        if (null !== $update->getCallbackQuery()) {

            $callback = $update->getCallbackQuery();
        } else {
            $callback = $update;
        }

        $message = $callback->getMessage();
        $chat_id = $message->getChat()->getId();
        $screen = [];

        \Yii::info("findScreen  data  {$data}" , 'chat');

        switch ($data) {




            case 'Меню':
                return $this->getStartScreen();
                break;
            /**
             * Проверка доступа к закрытой части
             */
            case 'btn_31121':

                $clients = BenClients::find()->where(['chatid'=>$chat_id])->one();
                if ($clients && $clients->is_moderate){
                    $sec = 'closed';
                }else{
                    $sec = $data;
                }
                break;
            default:
                $sec = $data;
        }

        $screen = \common\modules\bot\models\Screens::find()->where(['key' => $sec])->one();

        if ($screen) {
            \Yii::info("findScreen  найден скрин  " . $screen->key, 'chat');

            return $screen;
        }
        $screen = \common\modules\bot\models\Screens::find()->where(['is_start' => 1])->one();
        \Yii::info("findScreen   скрин не найден отправлен стартовый " . $screen->key, 'chat');
        return $screen;
    }


    /**
     * @param $chatId
     * @param $screen
     * @return bool
     */
    public function sendMessage($chatId, $screen, $text = ' ', $callback = 0)
    {

        \Yii::info("sendMessage текст:" . $text . " key:" . $screen->key . " title:" . $screen->title, 'chat');
        $messages = \common\modules\bot\models\WidgetText::find()->where(['screens_id' => $screen->id, 'status' => 1])->orderBy(['sort' => 'DESC'])->all();
        $keyboard = false;
        switch ($screen->key) {
            default:
                /**
                 *Дефолтная обработка
                 */
                \Yii::info("sendMessage  Дефолтная обработка", 'chat');
                foreach ($messages as $mes) {

                    if ($this->getInlineButtons($mes->id) !== false) {
                        $keyboard = $this->getInlineButtons($mes->id);
                    }
                    if ($this->getReplyButtons($mes->id) !== false) {
                        $keyboard = $this->getReplyButtons($mes->id);
                    }
                    \Yii::info("sendMessage message_id {$mes->id}", 'chat');
                   //  \Yii::info(print_r($keyboard, true), 'chat');
                    //\Yii::info(print_r($mes->getUploadUrl('images'), true), 'chat');
                    if ($mes->media || $mes->images) {
                        if ($mes->media) {
                            $bot_send = $this->bot->sendVideo($chatId, $mes->getUploadUrl('media'), null, Helper::GetText($mes->key), null, null, false);
                        }
                        if ($mes->images) {
                            $bot_send = $this->bot->sendPhoto($chatId, $mes->getUploadUrl('images'), Helper::GetText($mes->key), false, null, null);
                        }

                    } else {

                        if ($keyboard) {
                            $bot_send = $this->bot->sendMessage($chatId, Helper::GetText($mes->key), false, null, null, $keyboard);
                        } else {
                            $bot_send = $this->bot->sendMessage($chatId, Helper::GetText($mes->key), false, null, null);
                        }
                    }



                    \Yii::info("sendMessage отправлено  ".Helper::GetText($mes->key), 'chat');
                    Helper::Request_log($bot_send);

                }
        }


        return true;
    }


    public static function getInlineButtons($message_id)
    {
        $keyboard = false;
        $buttons_Inline = \common\modules\bot\models\Buttons::find()->where(['widget_text_id' => $message_id])->
        andWhere(['not', ['type' => 'ReplyKeyboardMarkup']])->
        asArray()->all();
        $btn_out_Inline = [];$i=1;$k=1;$j=1;$btnarr = [];
        if (count($buttons_Inline) > 0) {
            foreach ($buttons_Inline as $key => $btn) {

                $btnarr['text'] = $btn['text'];
                if ($btn['type'] == 'InlineKeyboardMarkup_url'){
                    $btnarr['url'] = $btn['url'];
                }else{
                    unset($btnarr['url']);
                }
                $btnarr['callback_data'] = $btn['callback_data'];
                switch ($btn['size']) {
                    case 'big':
                        $tmp[] = $btnarr;
                        if ($i % 1 == 0){
                            $btn_out_Inline[] = $tmp;
                            unset($tmp);
                        } $i++;
                        break;
                    case 'middle':
                        $tmp[] = $btnarr;
                        if ($k % 2 == 0){
                            $btn_out_Inline[] = $tmp;
                            unset($tmp);
                        }$k++;
                        break;
                    case 'small':
                        $tmp[] = $btnarr;
                        if ($j % 3 == 0){
                            $btn_out_Inline[] = $tmp;
                            unset($tmp);
                        } $j++;
                        break;
                    case 'minismall':
                        $tmp[] = $btnarr;
                        if ($j % 4 == 0){
                            $btn_out_Inline[] = $tmp;
                            unset($tmp);
                        } $j++;
                        break;
                }

            }

            // \Yii::info("sendMessage message_id {$message_id}", 'chat');
            // \Yii::info("sendMessage btn_out_Inline " . print_r($btn_out_Inline, true), 'chat');
            $keyboard = new  InlineKeyboardMarkup($btn_out_Inline);
        }
        return $keyboard;
    }

    public function getReplyButtons($message_id)
    {
        $keyboard = false;
        $buttons_Reply = \common\modules\bot\models\Buttons::find()->
        where(['widget_text_id' => $message_id, 'type' => 'ReplyKeyboardMarkup'])->asArray()->all();

        $btn_out_Reply = [];$i=1;$k=1;$j=1;$btnarr = [];
        if (count($buttons_Reply) > 0) {
            foreach ($buttons_Reply as $key => $btn) {

                $btnarr['text'] = $btn['text'];
                $btnarr['request_contact'] = (bool)$btn['request_contact'];
                $btnarr['request_location'] = (bool)$btn['request_location'];
                switch ($btn['size']) {
                    case 'big':
                        $tmp[] = $btnarr;
                        if ($i % 1 == 0){
                            $btn_out_Reply[] = $tmp;
                            unset($tmp);
                        } $i++;
                        break;
                    case 'middle':
                        $tmp[] = $btnarr;
                        if ($k % 2 == 0){
                            $btn_out_Reply[] = $tmp;
                            unset($tmp);
                        }$k++;
                        break;
                    case 'small':
                        $tmp[] = $btnarr;
                        if ($j % 3 == 0){
                            $btn_out_Reply[] = $tmp;
                            unset($tmp);
                        } $j++;
                        break;
                    case 'minismall':
                        $tmp[] = $btnarr;
                        if ($j % 4 == 0){
                            $btn_out_Reply[] = $tmp;
                            unset($tmp);
                        } $j++;
                        break;
                }

            }
           // \Yii::info("sendMessage buttons_Reply " . print_r($btn_out_Reply, true), 'chat');
            $keyboard = new  ReplyKeyboardMarkup($btn_out_Reply, false, true, true);
        }
        return $keyboard;
    }


}
