<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\modules\bot\commands\SystemCommands;

use common\modules\bot\commands\SystemCommand;


use common\modules\bot\commands\UserCommand;
use common\modules\bot\components\facebook\FbBotApp;
use common\modules\bot\components\facebook\Menu\LocalizedMenu;
use common\modules\bot\components\facebook\Menu\MenuItem;
use common\modules\bot\components\facebook\Messages\ImageMessage;
use common\modules\bot\components\facebook\Messages\Message;
use common\modules\bot\components\facebook\Messages\MessageButton;
use common\modules\bot\components\facebook\Messages\MessageElement;
use common\modules\bot\components\facebook\Messages\StructuredMessage;
use \common\modules\bot\components\Helper;
use common\modules\bot\components\telegram\Entities\ReplyKeyboardMarkup;
use common\modules\bot\components\viber\Api\Keyboard;
use common\modules\bot\components\viber\Api\Keyboard\Button;
use common\modules\bot\components\viber\Api\Message\CarouselContent;
use common\modules\bot\components\viber\Api\Message\Picture;
use common\modules\bot\components\viber\Api\Message\Text;
use common\modules\bot\components\viber\Api\Sender;
use common\modules\bot\components\vk\Bot;
use common\modules\bot\Conversation;
use common\modules\bot\models\BotButtons;
use common\modules\bot\models\BotOrder;
use common\modules\bot\models\BotScreens;
use common\modules\bot\models\Settings;
use common\modules\bot\models\Userbot;
use common\modules\bot\models\UserBotSearch;
use common\modules\bot\Request;
use common\modules\bot\models\BotImgId;
use common\modules\bot\models\ButtonsToUser;


/**
 * Generic message command
 */
class GenericmessageCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'Genericmessage';
    protected $description = 'Handle generic message';
    protected $version = '1.0.2';
    protected $need_mysql = true;
    /*#@-/


    public $debug = true;




    /**
     * Execution if MySQL is required but not available
     *
     * @return boolean
     */
    public function executeNoDb()
    {
        //Do nothing
        return Request::emptyResponse();
    }

    /**
     * Execute command
     *
     * @return boolean
     */
    public function execute()
    {

        \Yii::info("Genericmessage Start  platform {$this->platform->client} ", 'chat');
//        $update = $this->getUpdate();
//        $callback_query = $update->getCallbackQuery();
//
//
//        if (NULL != $callback_query) {
//
//            $callback_query_id = $callback_query->getId();
//            $text = $callback_query->getData();
//            $message = $callback_query->getMessage();
//
//            $user_id = $callback_query->getFrom()->getId();
//            $chat_id = $message->getChat()->getId();
//            $message_id = $message->getMessageId();
//        } else {
//
//            $message = $this->getMessage();
//
//            $chat = $message->getChat();
//            $user = $message->getFrom();
//            $text = $message->getText(true);
//
//            $chat_id = $chat->getId();
//            $user_id = $user->getId();
//            $message_id = $message->getMessageId();
//        }
//        $data['text'] = $text;
//
//        $data['parse_mode'] = 'HTML';
//
//        $result = Request::sendMessage($data);
//
//        return $result;

//            \Yii::info(print_r($this, true), 'chat');
//
//
//            $update = $this->getUpdate();
//            $callback_query = $update->getCallbackQuery();
//
//
//            if (NULL != $callback_query) {
//
//                $callback_query_id = $callback_query->getId();
//                $text = $callback_query->getData();
//                $message = $callback_query->getMessage();
//
//                $user_id = $callback_query->getFrom()->getId();
//                $chat_id = $message->getChat()->getId();
//                $message_id = $message->getMessageId();
//            } else {
//
//                $message = $this->getMessage();
//
//                $chat = $message->getChat();
//                $user = $message->getFrom();
//                $text = $message->getText(true);
//
//                $chat_id = $chat->getId();
//                $user_id = $user->getId();
//                $message_id = $message->getMessageId();
//            }
//
//                    $data['chat_id'] =$chat_id;
//                    $data['text'] =$text;
//                    $result =   Request::sendMessage($data);

        if ($this->platform->client == 'viber') {
            $inputViber = json_decode(file_get_contents('php://input'));
            //  \Yii::info(print_r($input['entry'],true), 'infostudiobot');
            if ($inputViber->event == 'seen' || $inputViber->event == 'delivered') {
                \Yii::info(" VIBER   seen delivered ", 'infostudiobot');
                return Request::emptyResponse();
            }
            $user_id = $inputViber->sender->id;
            $chat_id = $inputViber->sender->id;
            $text = $inputViber->message->text;
            $user_name = $inputViber->sender->name;


            $user = UserBotSearch::find()->where(['viber_id' => $user_id, 'platform' => 'viber'])->all();
            if (!$user) {
                Helper::addUserViber($user_id, $user_name,'viber');
            }


        }

        if ($this->platform->client == 'telegram') {

            $update = $this->getUpdate();

            $update_type = $update->getUpdateType();
            if ($update_type != false) {
                \Yii::info("    update type" . print_r($update_type, true), 'infostudiobot');

            }

            $pre_checkout_query = $update->getPreCheckoutQuery();
            if ($pre_checkout_query != false) {

                \Yii::info("    update pre_checkout_query" . print_r($pre_checkout_query, true), 'infostudiobot');

                $data['pre_checkout_query_id'] = $pre_checkout_query->getId();
                $data['ok'] = true;
                \Yii::info("getScreen    answerPreCheckoutQuery " . print_r($data, true), 'infostudiobot');
                $result = Request::answerPreCheckoutQuery($data);

                return $result;


            }


            $id = json_decode(\Yii::$app->request->getRawBody(), true);
            if (isset($id['message']['successful_payment'])) {
                \Yii::info("id       " . print_r($id['message']['successful_payment'], true), 'infostudiobot');
                $ordeId = $id['message']['successful_payment']['invoice_payload'];
                $model = BotOrder::findOne($ordeId);

                \Yii::info("BotOrder      " . $ordeId, 'infostudiobot');

                if ($model) {
                    $model->status = 1;
                    if (!$model->update()) {
                        \Yii::info("getErrors      " . print_r($model->getErrors(), true), 'infostudiobot');
                    } else {
                        \Yii::info("update order      " . print_r($model->id, true), 'infostudiobot');
                        $st_pay = [0 => 'не оплачен', 1 => 'оплачен' ];
                        $text_out = "\r\n";
                        $text_out .= "Квитанция по заказу #" . $model->id . ": " . "\r\n";
                        // Helper::sendMail(Helper::getEmailCustomer($model->chat_id), 'Квитанция по заказу semoshi.ru', $text_out);
                        \Yii::info("sendMail {$text_out}", 'infostudiobot');
                        $data['text'] = $text_out. "\r\n".'  '."\r\n";
                        $data['chat_id'] = $model->user_id;
                        $result = Request::sendMessage($data);
                        return $result;
                    }
                }






            }


            $callback_query = $update->getCallbackQuery();
            if (NULL != $callback_query) {
                $callback_query_id = $callback_query->getId();
                $text = $callback_query->getData();
                $message = $callback_query->getMessage();

                $user_id = $callback_query->getFrom()->getId();
                $chat_id = $message->getChat()->getId();
                $message_id = $message->getMessageId();

                $FirstName = $callback_query->getFrom()->getFirstName();
                $LastName = $callback_query->getFrom()->getLastName();

            } else {
                \Yii::info(print_r( json_decode(file_get_contents('php://input'), true),true), 'chat');
                $message = $this->getMessage();
                $chat = $message->getChat();
                $user = $message->getFrom();
                $FirstName = $user->getFirstName();
                $LastName = $user->getLastName();
                $text = $message->getText(true);
                $chat_id = $chat->getId();
                $user_id = $user->getId();
                $message_id = $message->getMessageId();
            }





            \Yii::info("TEXT ---   " . $text, 'chat');
            \Yii::info("CHAT_ID ---   " . $chat_id, 'chat');






        }

        if ($this->platform->client == 'vk') {





            $Vk = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));

            $message = false;
            $dataVk = json_decode(file_get_contents('php://input'));
            //\Yii::info("actionVk \r\n".print_r($dataVk,true), 'chat');
            if (isset($dataVk->object) && $dataVk->type <> "confirmation") {
                $user_id = $dataVk->object->user_id;
                $chat_id = $dataVk->object->user_id;
                $group_id = $dataVk->group_id;
                $FirstName = '';
                $LastName = '';

                $profile = $Vk->vkApi_usersGet($user_id);
                \Yii::info("Профиль --  " . print_r($profile,true), 'chat');
                $firstname=null;$lastname=null;
                if ($profile) {
                    $FirstName = isset($profile[0]['first_name'])?$profile[0]['first_name']:null;
                    $LastName = isset($profile[0]['last_name'])?$profile[0]['last_name']:null;
                }
            }

            if (isset($dataVk->object->body)) {
                $payload = json_decode($dataVk->object->body,true);

                \Yii::info("payload ---   " . print_r($payload,true), 'chat');
                $command = false;
                if (isset($payload)) {

                    $text = isset($payload['button']) ? $payload['button'] : '';
                    $command = isset($payload['command']) ? $payload['command'] : '';

                    if($command=='start'){
                        return   $this->platform->executeCommand('start', $this->update);
                    }
                } else {
                    $text = $dataVk->object->body;
                }
            } else {
                $text = $dataVk->object->body;
            }



            \Yii::info("text --  " . print_r($text,true), 'chat');




        }

        if ($this->platform->client == 'facebook') {

            \Yii::info("dGenericmessage  platform {$this->platform->client} ", 'chat');

            $input = json_decode(file_get_contents('php://input'), true);

              \Yii::info(print_r($input['entry'],true), 'chat');

            $user_id = $input['entry'][0]['messaging'][0]['sender']['id'];
            $chat_id = $input['entry'][0]['messaging'][0]['sender']['id'];
//            $user_id = $input['entry'][0]['messaging'][0]['recipient']['id'];
//            $chat_id = $input['entry'][0]['messaging'][0]['recipient']['id'];

            \Yii::info("input ".print_r($input), 'chat');


            Helper::addChatUser($user_id);

            $messaging = $input['entry'][0]['messaging'][0];

            \Yii::info("MESSAGIN", 'chat');
            \Yii::info(print_r($messaging,true), 'chat');


            if (isset($messaging['delivery']) || isset($messaging['read']) || isset($messaging['message']['is_echo'])) {


                \Yii::info("emptyResponse --- ", 'chat');

                return Request::emptyResponse();

            }

            if (isset($messaging['message']['text'])) {

                \Yii::info("text fb {$messaging['message']['text']}", 'chat');

                $text = $messaging['message']['text'];

            }



            if (isset($messaging['postback'])) {

                \Yii::info("postback fb {$messaging['postback']['payload']}", 'chat');

                $text = $messaging['postback']['payload'];

            }




//            \Yii::info("Genericmessage text   " . $text ? $text : '', 'chat');


            //$text = '';
//            $verify_token = "JhdyTD2tgT5TrVF45QP5FJ"; // Verify token
//            $token = "EAAUqoVSh8D4BAFolwmLPH1azRjUQo4ZBAFMkbzp7LE1yNwxKkYZC2SM982qMDhQZCVJDk25IdwDsutO5RAsYftwuPivk2Vx5IUDbIPyGS8w7gsWJq2jg6pSF1H8wG7l5ScxBeTyZATWuSdoirUzZBgYiRWJEvswpnZAR7PagTLcwZDZD"; // Verify token
//            if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $verify_token) {
//                echo $_REQUEST['hub_challenge'];
//
//            }
//            $bot = new FbBotApp($token);
//
//            if (!empty($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe' && $_REQUEST['hub_verify_token'] == $verify_token) {
//                // Webhook setup request
//                echo $_REQUEST['hub_challenge'];
//            } else {
//
//                $data = json_decode(file_get_contents("php://input"), true);
//                if (!empty($data['entry'][0]['messaging'])) {
//                    foreach ($data['entry'][0]['messaging'] as $message) {
////                    \Yii::info("РґР°С‚Р° \r\n", 'chat');
////                    \Yii::info(print_r(json_encode($data), true), 'chat');
////                    \Yii::info("СЃРѕРѕР±С‰РµРЅРёРµ \r\n", 'chat');
////                    \Yii::info(print_r($message, true), 'chat');
////                    \Yii::info("\r\n", 'chat');
//                        // РџРѕР»СѓС‡РµРЅРѕ СЃРѕРѕР±С‰РµРЅРёРµ
//
//                        if (!empty($message['delivery'])) {
//                            continue;
//                        }
//
//                        if (!empty($message['read'])) {
//                            continue;
//                        }
//
//                        if (isset($message['message']['is_echo']) && $message['message']['is_echo'] == 1) {
//                            continue;
//                        }
//
//
//                        $command = "";
//                        // РџРѕР»СѓС‡РµРЅРѕ СЃРѕРѕР±С‰РµРЅРёРµ РѕС‚ РїРѕР»СЊР·РѕРІР°С‚РµР»СЏ, Р·Р°РїРёСЃС‹РІР°РµРј РєР°Рє РєРѕРјР°РЅРґСѓ
//                        if (!empty($message['message'])) {
//                            $command = $message['message']['text'];
//                            // РР›Р Р—Р°С„РёРєСЃРёСЂРѕРІР°РЅ РїРµСЂРµС…РѕРґ РїРѕ РєРЅРѕРїРєРµ, Р·Р°РїРёСЃС‹РІР°РµРј РєР°Рє РєРѕРјР°РЅРґСѓ
//                        } else if (!empty($message['postback'])) {
//                            $command = $message['postback']['payload'];
//                        }
//
//
//                        \Yii::info("РєРѕРјР°РЅРґР° \r\n", 'chat');
//                        \Yii::info(print_r($command, true), 'chat');
//                        \Yii::info("message \r\n", 'chat');
//                        \Yii::info(print_r($message, true), 'chat');
//
//
//                        // РћР±СЂР°Р±Р°С‚С‹РІР°РµРј РєРѕРјР°РЅРґСѓ
//                        switch ($command) {
//
//
//                            // When bot receive "text"
//                            case 'text':
//                                $bot->send(new Message($message['sender']['id'], 'This is a simple text message.'));
//                                break;
//
//                            // When bot receive "button"
//                            case 'button':
//                                $bot->send(new StructuredMessage($message['sender']['id'],
//                                    StructuredMessage::TYPE_BUTTON,
//                                    [
//                                        'text' => 'Choose category',
//                                        'buttons' => [
//                                            new MessageButton(MessageButton::TYPE_POSTBACK, 'First button'),
//                                            new MessageButton(MessageButton::TYPE_POSTBACK, 'Second button'),
//                                            new MessageButton(MessageButton::TYPE_POSTBACK, 'Third button')
//                                        ]
//                                    ]
//                                ));
//                                break;
//
//                            // When bot receive "generic"
//                            case 'generic':
//
//                                $bot->send(new StructuredMessage($message['sender']['id'],
//                                    StructuredMessage::TYPE_GENERIC,
//                                    [
//                                        'elements' => [
//                                            new MessageElement("First item", "Item description", "", [
//                                                new MessageButton(MessageButton::TYPE_POSTBACK, 'First button'),
//                                                new MessageButton(MessageButton::TYPE_WEB, 'Web link', 'http://facebook.com')
//                                            ]),
//
//                                            new MessageElement("Second item", "Item description", "", [
//                                                new MessageButton(MessageButton::TYPE_POSTBACK, 'First button'),
//                                                new MessageButton(MessageButton::TYPE_POSTBACK, 'Second button')
//                                            ]),
//
//                                            new MessageElement("Third item", "Item description", "", [
//                                                new MessageButton(MessageButton::TYPE_POSTBACK, 'First button'),
//                                                new MessageButton(MessageButton::TYPE_POSTBACK, 'Second button')
//                                            ])
//                                        ]
//                                    ]
//                                ));
//
//                                break;
//
//                            // When bot receive "receipt"
//                            case 'receipt':
//
//                                $bot->send(new StructuredMessage($message['sender']['id'],
//                                    StructuredMessage::TYPE_RECEIPT,
//                                    [
//                                        'recipient_name' => 'Fox Brown',
//                                        'order_number' => rand(10000, 99999),
//                                        'currency' => 'USD',
//                                        'payment_method' => 'VISA',
//                                        'order_url' => 'http://facebook.com',
//                                        'timestamp' => time(),
//                                        'elements' => [
//                                            new MessageReceiptElement("First item", "Item description", "", 1, 300, "USD"),
//                                            new MessageReceiptElement("Second item", "Item description", "", 2, 200, "USD"),
//                                            new MessageReceiptElement("Third item", "Item description", "", 3, 1800, "USD"),
//                                        ],
//                                        'address' => new Address([
//                                            'country' => 'US',
//                                            'state' => 'CA',
//                                            'postal_code' => 94025,
//                                            'city' => 'Menlo Park',
//                                            'street_1' => '1 Hacker Way',
//                                            'street_2' => ''
//                                        ]),
//                                        'summary' => new Summary([
//                                            'subtotal' => 2300,
//                                            'shipping_cost' => 150,
//                                            'total_tax' => 50,
//                                            'total_cost' => 2500,
//                                        ]),
//                                        'adjustments' => [
//                                            new Adjustment([
//                                                'name' => 'New Customer Discount',
//                                                'amount' => 20
//                                            ]),
//
//                                            new Adjustment([
//                                                'name' => '$10 Off Coupon',
//                                                'amount' => 10
//                                            ])
//                                        ]
//                                    ]
//                                ));
//
//                                break;
//
//                            // Other message received
//                            default:
//                                $bot->send(new Message($message['sender']['id'], Helper::dialog($command)));
//
//                            // $bot->send(new Message($message['sender']['id'], 'РЇ РІР°СЃ РЅРµ РїРѕРЅСЏР» РїРѕРІС‚РѕСЂРёС‚Рµ'));
//                        }
//
//
//                    }
//                }
//            }
            $FirstName = '';
            $LastName = '';
//            if (isset($input['object']) && $input['object'] == 'page') {
//                $object = $input['object'];
//                \Yii::info("input object".print_r($input['object']), 'chat');
//
//                return Request::emptyResponse();
//            }
        }



        //If a conversation is busy, execute the conversation command after handling the message
        $conversation = new Conversation(
            $user_id,
            $chat_id
        );
        //Fetch conversation command if it exists and execute it
        if ($conversation->exists() && ($command = $conversation->getCommand())) {
            return $this->platform->executeCommand($command, $this->update);
        }



        if ($this->platform->client != 'viber') {
            Helper::addUser($this->platform->client,$user_id,$FirstName,$LastName);
        }


        if ($this->platform->client == 'facebook') {
            if (isset($messaging['postback']) && $text == 'ru-RU') {
                $user = Helper::SetLanguage($user_id,'ru-RU');
                $result =  Helper::getScreenFb($user_id, 'startovyj-ekranfb','ru-RU');
                return Request::emptyResponse();


            }
            if (isset($messaging['postback']) && $text == 'en-US') {
                $user = Helper::SetLanguage($user_id,'en-US');
                $result =  Helper::getScreenFb($user_id, 'startovyj-ekranfb','en-US');
                return Request::emptyResponse();
            }
        }



        $data['chat_id'] = $chat_id;

//        \Yii::info("Проверка для кнопки новости ---   " . $text, 'chat');

        switch ($text) {

            default:
                $buttons = BotButtons::find()->where(['text'=>$text])->one();
                if(is_object($buttons)){
                    $sec = $buttons->callback_data;

                }else{
                    $sec = $text;
                }
        }

        \Yii::info("findScreen  ищем экран   key = " . $sec ." platform = ".$this->platform->client, 'chat');

        $screen = BotScreens::find()->where(['key' => $sec,'platform'=>$this->platform->client])->one();
        if ($screen) {
            \Yii::info("findScreen  Нашли экран с переданным ключем  " . $screen->key, 'chat');
        }else {

            if ($this->platform->client == 'facebook') {
                $lang = Helper::GetLanguage($chat_id);
                if (isset($lang)) {


                    $screenw = BotScreens::find()->where(['is_start' => 1,'platform'=>$this->platform->client])->one();
                    if ($screenw) {
                        $screen = BotScreens::find()->where(['parent_id' => $screenw->id,'platform'=>$this->platform->client])->one();
                        \Yii::info("findScreen   Не нашли экран с переданным ключем достаем после стартового экран по платформе " . $sec, 'chat');
                    } else {
                        $screen = BotScreens::find()->where(['is_start' => 1,'platform'=>$this->platform->client])->one();

                    }


                } else {
                    $screen = BotScreens::find()->where(['is_start' => 1,'platform'=>$this->platform->client])->one();

                    \Yii::info("findScreen   Не нашли экран с переданным ключем достаем стартовый экран по платформе " . $sec, 'chat');
                }
            } else {
                $screen = BotScreens::find()->where(['is_start' => 1,'platform'=>$this->platform->client])->one();
                \Yii::info("findScreen   Не нашли экран с переданным ключем достаем стартовый экран по платформе " . $sec, 'chat');

            }

        }

       // \Yii::info("sendMessage :" . $text . " key:" . $screen->key . " title:" . $screen->title, 'chat');

//        $user = Userbot::findOne($chat_id);
//        if($screen->auth  && !Helper::checkUser($user->username,$user->pass)){
//
//            $text='Вы не авторизованы';
//            $btn = [
//                'one_time' => true,
//                'buttons' => [
//
//                    [
//
//
//                        [
//                            'action' => [
//                                'type' => 'text',
//                                'payload' => json_encode(['button' => "menu"], JSON_UNESCAPED_UNICODE),
//                                'label' => 'Меню'
//                            ],
//                            "color"=> "positive" ,
//                        ],
//
//
//                    ]
//                ],
//            ];
//            $result = $Vk->vkApi_messagesSend($chat_id, '-' . $group_id, $text, json_encode($btn, JSON_UNESCAPED_UNICODE));
//            return Request::emptyResponse();
//
//        }


        $messages = \common\modules\bot\models\WidgetText::find()->where(['screens_id' => $screen->id, 'status' => 1])->orderBy(['sort' => 'DESC'])->all();
        $keyboard = false;

        switch ($screen->key) {
            default:

                \Yii::info("sendMessage  Начинаем подготовку к отправке сообщения", 'chat');
                $btnVk = [];
                foreach ($messages as $mes) {


                    $txt = Helper::GetText($mes->key);
                    \Yii::info("    sendMessage message_id {$mes->id}   text -  {$txt}", 'chat');
                    $data = Helper::getKeyBoard($mes->id);

                    $count = $mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->count();
                    $data['chat_id'] = $chat_id;
                    $keyboard = [];
                    //
                    $buttons_Reply = BotButtons::find()->where(['widget_text_id' => $mes->id, 'type' => 'ReplyKeyboardMarkup'])->asArray()->all();
                    $buttons_Reply_url = BotButtons::find()->where(['widget_text_id' => $mes->id, 'type' => 'ReplyKeyboardMarkup_url'])->asArray()->all();
                    $buttons_Reply = array_merge($buttons_Reply,$buttons_Reply_url);

                    \Yii::info("    buttons_Reply  ".print_r($buttons_Reply,true), 'chat');
                    $btn_out_Reply = [];
                    $i = 1;    $k = 1;   $j = 1;
                    $btnarr = [];
                    if (count($buttons_Reply) > 0) {
                        foreach ($buttons_Reply as $key => $btn) {


                            $btnarr['action'] = [
                                'type' => 'text',
                                'payload' => json_encode(['button' => $btn['callback_data']], JSON_UNESCAPED_UNICODE),
                                'label' => $btn['text'],
                            ];
                            switch ($btn['size']) {
                                case 'big':
                                    $tmp[] = $btnarr;
                                    if ($i % 1 == 0) {
                                        $btn_out_Reply[] = $tmp;
                                        unset($tmp);
                                    }
                                    $i++;
                                    break;
                                case 'middle':
                                    $tmp[] = $btnarr;
                                    if ($k % 2 == 0) {
                                        $btn_out_Reply[] = $tmp;
                                        unset($tmp);
                                    }
                                    $k++;
                                    break;
                                case 'small':
                                    $tmp[] = $btnarr;
                                    if ($j % 3 == 0) {
                                        $btn_out_Reply[] = $tmp;
                                        unset($tmp);
                                    }
                                    $j++;
                                    break;
                                case 'minismall':
                                    $tmp[] = $btnarr;
                                    if ($j % 4 == 0) {
                                        $btn_out_Reply[] = $tmp;
                                        unset($tmp);
                                    }
                                    $j++;
                                    break;
                            }

                        }
                        \Yii::info("sendMessage buttons_Reply " . print_r($btn_out_Reply, true), 'chat');
                        $keyboard = $btn_out_Reply;
                    }

                    $btn = [
                        'one_time' => true,
                        'buttons' => $keyboard,
                    ];



                    $btnVk = array_merge($btnVk,$btn);

                    $tokenFB = env('BOT_TOKEN_FB');

                    $settings = Helper::getToken();
                    if ($count) {
                        foreach ($mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {
                            if ($image->type == 'image/jpeg' || $image->type == 'image/gif' || $image->type == 'image/png') {

                                switch ($this->platform->client) {

                                    case 'facebook':

                                        $bot = new FbBotApp($tokenFB);

                                        foreach ($input['entry'][0]['messaging'] as $message) {

                                            \Yii::info("sendMessage mes->body " . print_r(\Yii::t('frontend',$mes->body,[],'ru-RU' ), true), 'chat');
                                            \Yii::info("sendMessage mes->body get " . print_r(\Yii::t('frontend',$mes->body,[],Helper::GetLanguage($message['sender']['id']) ), true), 'chat');



                                            if (!empty($mes->body)){
                                                $bot->send(new ImageMessage($message['sender']['id'], $image->getUrl()));

                                               if(Helper::getFbButtons($mes->id,$message['sender']['id'])){

                                                   $result = $bot->send(new StructuredMessage($message['sender']['id'],
                                                       StructuredMessage::TYPE_BUTTON,
                                                       [
                                                           'text' => \Yii::t('frontend',$mes->body,[],Helper::GetLanguage($message['sender']['id']) ),
                                                           'buttons' => Helper::getFbButtons($mes->id,$message['sender']['id'])
                                                       ]
                                                   ));
                                               }else{
                                                   $bot->send(new Message($message['sender']['id'],\Yii::t('frontend',$mes->body,[],Helper::GetLanguage($message['sender']['id']) )));
                                               }


                                            }else{



                                                $bot->send(new ImageMessage($message['sender']['id'], $image->getUrl()));
                                            }


                                            \Yii::info("    sendPhoto  {$image->getUrl()} FB" . print_r($message['sender']['id'], true), 'chat');


                                        }
                                        $result = Request::emptyResponse();

                                        break;
                                    case 'telegram':


                                        $data['photo'] = $image->getUrl();
                                        $data['caption'] = $txt;
                                        \Yii::info("    sendPhoto " . print_r($data['photo'], true), 'chat');
                                        $result = Request::sendPhoto($data);


                                        break;
                                    case 'vk':
                                        $vk_id = BotImgId::find()->where(['user_id' => $user_id, 'img_id' => $image->id])->one();
                                        if ($vk_id) {
                                            $attachments = 'photo' . $user_id . '_' . $vk_id->vk_id;
                                            $result =  $Vk->vkApi_messagesSend($user_id, '-' . $group_id, $txt, json_encode($btnVk, JSON_UNESCAPED_UNICODE), false, $settings->group_id, $attachments);

                                        } else {

                                            $result = $Vk->uploadPhoto($user_id,$image->getPath() , $image->id);
                                            if (isset($result['id'])) {
                                                $attachments = 'photo' . $result['owner_id'] . '_' . $result['id'];
                                                $result =  $Vk->vkApi_messagesSend($user_id, '-' . $group_id, $txt, json_encode($btnVk, JSON_UNESCAPED_UNICODE), false, $settings->group_id, $attachments);

                                            }
                                        }


                                        $result = Request::emptyResponse();

                                        break;
                                    case 'viber':

                                        $botViber = new \common\modules\bot\components\viber\Bot(['token' => getenv('BOT_TOKEN_VIBER')]);

                                        $buttons = [];
                                        $buttons_Inline = BotButtons::find()->where(['widget_text_id' => $mes->id])->
                                        andWhere(['not', ['type' => 'ReplyKeyboardMarkup']])->asArray()->all();

                                        if (count($buttons_Inline) > 0) {
                                            foreach ($buttons_Inline as $key => $btn) {

                                                $buttons[] = (new Button())
                                                    ->setColumns(6)
                                                    ->setRows(2)
                                                    ->setActionType('reply')
                                                    ->setActionBody($btn['callback_data'])
                                                    ->setText($btn['text'])
                                                    ->setBgColor('#CCCCCC');

                                            }

                                        }


                                        $buttons_Reply = BotButtons::find()->
                                        where(['widget_text_id' => $mes->id, 'type' => 'ReplyKeyboardMarkup'])->asArray()->all();

                                        if (count($buttons_Reply) > 0) {
                                            foreach ($buttons_Reply as $key => $btn) {

                                                $buttons[] = (new Button())
                                                    ->setColumns(6)
                                                    ->setRows(2)
                                                    ->setActionType('reply')
                                                    ->setActionBody($btn['callback_data'])
                                                    ->setText($btn['text'])
                                                    ->setBgColor('#CCCCCC');

                                            }

                                        }


                                        $botSender = new Sender([
                                            'name' => getenv('BOT_VIBER_NAME'),
                                            'avatar' => getenv('BOT_VIBER_AVATAR'),
                                        ]);


                                        if (count($buttons) > 0) {
                                            $result = $botViber->getClient()->sendMessage(
                                                (new Picture())->setSender($botSender)
                                                    ->setReceiver($user_id)
                                                    ->setMedia($image->getUrl())
                                                    ->setKeyboard(
                                                        (new Keyboard())
                                                            ->setButtons($buttons)
                                                    )
                                            );
                                        } else {
                                            $result = $botViber->getClient()->sendMessage(
                                                (new Picture())->setSender($botSender)
                                                    ->setReceiver($user_id)
                                                    ->setMedia($image->getUrl())

                                            );
                                        }


                                        $result = Request::emptyResponse();
                                        break;


                                }


                            }

                            if ($image->type == 'application/pdf' || $image->type == 'application/msword'  || $image->type == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {


                                switch ($this->platform->client) {


                                    case 'facebook':
                                        //   $bot = new FbBotApp($token);

                                        $result = Request::emptyResponse();
                                        break;
                                    case 'tlegram':
                                        $data['video'] = $image->getUrl();
                                        $data['caption'] = $txt;
                                        \Yii::info("    sendVideo " . print_r($data['video'], true), 'infostudiobot');
                                        $result = Request::sendVideo($data);
                                        break;
                                    case 'vk':
                                        \Yii::info(print_r($btn, true), 'infostudiobot');
                                        $result =  $Vk->vkApi_messagesSend($user_id, '-' . $group_id, $txt, json_encode($btnVk, JSON_UNESCAPED_UNICODE));
                                        $result = Request::emptyResponse();
                                        break;
                                    case 'viber':
                                        $result = Request::emptyResponse();
                                        break;




                                }
                            }

//                            if ($image->type == 'video/mp4') {
//
//
//                                switch ($this->platform->client) {
//
//                                    case 'facebook':
//                                           //   $bot = new FbBotApp($token);
//                                        foreach ($input['entry'][0]['messaging'] as $message) {
//
//
//                                        }
//
//                                        $result = Request::emptyResponse();
//
//
//                                        break;
//                                    case 'tlegram':
//
//                                        $data['video'] = $image->getUrl();
//                                        $data['caption'] = $txt;
//                                        \Yii::info("    sendVideo " . print_r($data['video'], true), 'chat');
//                                        $result = Request::sendVideo($data);
//
//
//                                        break;
//                                    case 'vk':
//                                        \Yii::info(print_r($btn, true), 'chat');
//                                        $result = $Vk->vkApi_messagesSend($user_id, '-' . $group_id, $txt, json_encode($btnVk, JSON_UNESCAPED_UNICODE));
//                                        $result = Request::emptyResponse();
//                                        break;
//
//                                    case 'viber':
//
//
//                                        $result = Request::emptyResponse();
//                                        break;
//                                }
//                            }
                        }
                    } else {
                        if ($txt) {



                            \Yii::info("    sendMessage " . print_r($txt, true)."\r\nBtn\r\n" . print_r($btnVk, true), 'chat');
//                            if($sec=='ssylka'){
//
//                                if($this->platform->client=='vk'){
//                                    $link = "https://vk.com/write-165490981?start=".$user_id;
//                                }else{
//                                    $link = "http://t.me/roztorbot?start=".$user_id;
//                                }
//
//
//                                if($user){
//                                    $txt = str_replace("{link}", $link, $txt);
//                                }
//
//
//
//                            }

//                            if($sec=='profile'){
//                                $user = Userbot::find()->where(['id' =>$user_id])->one();
//
//                                $user = Userbot::find()->where(['phone'=>$user->phone])->asArray()->all();
//
//                                if($user){
//                                    $bonus = 0;
//                                    foreach ($user as $item) {
//                                        \Yii::info("   bonus " .$bonus , 'chat');
//
//                                        $bonus = $bonus + $item['bonus'];
//                                        \Yii::info("   bonus " . $item['bonus'] , 'chat');
//
//                                    }
//
//                                    \Yii::info("   bonus " .$bonus , 'chat');
//
//                                    $txt = str_replace("{balls}", $bonus, $txt);
//                                }
//                            }
                            \Yii::info("   !!!!!!!!!!!!!!!!!!!!!! txt ".print_r(\Yii::t('frontend',$txt,[],'ru-RU' ),true), 'chat');

                            switch ($this->platform->client) {
                                case 'facebook':


                                    //    $myAccountItems[] = new MenuItem('postback', 'Рћ РєРѕРјРїР°РЅРёРё', 'PAYBILL_PAYLOAD');
//                                    $historyItems[] = new MenuItem('postback', 'History Old', 'HISTORY_OLD_PAYLOAD');
//                                    $historyItems[] = new MenuItem('postback', 'History New', 'HISTORY_NEW_PAYLOAD');
                                    //$myAccountItems[] = new MenuItem('nested', 'History', $historyItems);
                                    //   $myAccountItems[] = new MenuItem('postback', 'РЈСЃР»СѓРіРё', 'CONTACT_INFO_PAYLOAD');
                                    //   $myAccountItems[] = new MenuItem('postback', 'РџСЂРѕРµРєС‚С‹', 'CONTACT_INFO_PAYLOAD');

                                    // $myAccount = new MenuItem('nested', 'РћСЃРЅРѕРІРЅРѕРµ РјРµРЅСЋ', $myAccountItems);


//                                    $enMenu = new LocalizedMenu('default', false, [
//                                        new MenuItem('postback', 'РќР°Р·Р°Рґ', 'nazad')
//                                    ]);
//
//
//                                    $localizedMenu[] = $enMenu;

                                    // \Yii::info("    localizedMenu ".print_r($localizedMenu,true), 'chat');


                                    $bot = new FbBotApp($tokenFB);
                                   // $bot->deletePersistentMenu();
                                    //$bot->setPersistentMenu($localizedMenu);

                                    if (Helper::getFbButtons($mes->id,$user_id)) {



                                        \Yii::info("    txt ".print_r(\Yii::t('frontend',$txt ),true), 'chat');

                                        $result = $bot->send(new StructuredMessage($user_id,
                                            StructuredMessage::TYPE_BUTTON,
                                            [
                                                'text' => \Yii::t('frontend',$txt ,[],Helper::GetLanguage($user_id)),
                                                'buttons' => Helper::getFbButtons($mes->id,$user_id)
                                            ]
                                        ));
//2
                                    } else {
                                         \Yii::info("    txt ".print_r(\Yii::t('frontend',$txt ),true), 'chat');
                                        $result =   $bot->send(new Message($user_id, \Yii::t('frontend',$txt ,[],Helper::GetLanguage($user_id))));
                                    }

                                    $result = Request::emptyResponse();


                                    break;
                                case 'telegram':






                                    $data['text'] = $txt;

                                    $data['parse_mode'] = 'HTML';

                                    $result = Request::sendMessage($data);


                                    break;
                                case 'vk':

                                    \Yii::info("    отправляем сообщение user " .$user_id.' peer_id '.' -'.$group_id.' текст '. print_r($txt, true), 'chat');
                                    \Yii::info("    кнопки " .    print_r(json_encode($btn, JSON_UNESCAPED_UNICODE), true), 'chat');
                                    $result = $Vk->vkApi_messagesSend($user_id, '-' . $group_id, $txt, json_encode($btnVk, JSON_UNESCAPED_UNICODE));
                                    $result = Request::emptyResponse();

                                    break;
                                case 'viber':

                                    $botSender = new Sender([
                                        'name' => getenv('BOT_VIBER_NAME'),
                                        'avatar' => getenv('BOT_VIBER_AVATAR'),
                                    ]);
                                    // $result = Request::$platform->getClient()->sendMessage(
                                    // (new Picture())->setSender($botSender)
                                    // ->setReceiver($user_id)
                                    // ->setMedia('http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl='.$user_id)
                                    // );

                                    $buttonsRep = [];
                                    $buttonsInl = [];

                                    $buttons_Inline =  BotButtons::find()->where(['widget_text_id' => $mes->id])->
                                    andWhere(['not', ['type' => 'ReplyKeyboardMarkup']])->asArray()->all();

                                    $ar_size = ['big' => 6, 'middle' => 5, 'small' => 3, 'minismall' => 2];

                                    $count_btn = count($buttons_Inline);
                                    $btn_size =0;


                                    if (count($buttons_Inline) > 0) {
                                        foreach ($buttons_Inline as $key => $btn) {


                                            $buttonsInl[] = (new Button())
                                                ->setColumns($ar_size[$btn['size']])
                                                ->setRows(2)
                                                ->setActionType('reply')
                                                ->setActionBody($btn['callback_data'])
                                                ->setTextSize('large')
                                                ->setBgColor($btn['color'])
                                                ->setText($btn['text']);

                                            $btn_size = $ar_size[$btn['size']];


                                        }

                                    }

                                    $buttons_Reply = BotButtons::find()->
                                    where(['widget_text_id' => $mes->id, 'type' => 'ReplyKeyboardMarkup'])->asArray()->all();
                                    if (count($buttons_Reply) > 0) {
                                        foreach ($buttons_Reply as $key => $btn) {

                                            $buttonsRep[] = (new Button())
                                                ->setActionType('reply')
                                                ->setActionBody($btn['callback_data'])
                                                ->setText($btn['text'])
                                                ->setBgColor($btn['color'])
                                                ->setTextSize('large');

                                            $btn_size = $ar_size[$btn['size']];
                                        }

                                    }

                                    $botViber = new \common\modules\bot\components\viber\Bot(['token' => getenv('BOT_TOKEN_VIBER')]);

                                    if (count($buttonsRep) > 0) {
                                        $result = $botViber->getClient()->sendMessage(
                                            (new Text())->setSender($botSender)
                                                ->setReceiver($user_id)
                                                ->setText($txt)
                                                ->setKeyboard(
                                                    (new Keyboard())
                                                        ->setButtons($buttonsRep)
                                                )
                                        );
                                    } else {
                                        $result = $botViber->getClient()->sendMessage(
                                            (new Text())->setSender($botSender)
                                                ->setReceiver($user_id)
                                                ->setText($txt)

                                        );
                                    }


//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(3)
//                                        ->setActionType('open-url')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setImage('https://storage.infomarketstudio.ru/source/1/S7uRc7doDvOWk8eLUu2gKYmyusCV_2cZ.jpg');
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(2)
//                                        ->setText("РўРµРєСЃС‚ ")
//                                        ->setActionType('open-url')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setTextSize("medium");
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(1)
//                                        ->setText("buy")
//                                        ->setActionType('reply')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setImage('https://storage.infomarketstudio.ru/source/1/S7uRc7doDvOWk8eLUu2gKYmyusCV_2cZ.jpg');
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(1)
//                                        ->setText("РџРѕРґСЂРѕР±РЅРµР№")
//                                        ->setActionType('reply')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setTextSize('small');
//
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(3)
//                                        ->setActionType('open-url')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setImage('https://storage.infomarketstudio.ru/source/1/S7uRc7doDvOWk8eLUu2gKYmyusCV_2cZ.jpg');
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(2)
//                                        ->setText("РўРµРєСЃС‚ ")
//                                        ->setActionType('open-url')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setTextSize("medium");
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(1)
//                                        ->setText("buy")
//                                        ->setActionType('reply')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setImage('https://storage.infomarketstudio.ru/source/1/S7uRc7doDvOWk8eLUu2gKYmyusCV_2cZ.jpg');
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(1)
//                                        ->setText("РџРѕРґСЂРѕР±РЅРµР№")
//                                        ->setActionType('reply')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setTextSize('small');
//
//
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(3)
//                                        ->setActionType('open-url')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setImage('https://storage.infomarketstudio.ru/source/1/S7uRc7doDvOWk8eLUu2gKYmyusCV_2cZ.jpg');
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(2)
//                                        ->setText("РўРµРєСЃС‚ ")
//                                        ->setActionType('open-url')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setTextSize("medium");
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(1)
//                                        ->setText("buy")
//                                        ->setActionType('reply')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setImage('https://storage.infomarketstudio.ru/source/1/S7uRc7doDvOWk8eLUu2gKYmyusCV_2cZ.jpg');
//
//                                    $buttonsC[] = (new Button())
//                                        ->setColumns(6)
//                                        ->setRows(1)
//                                        ->setText("РџРѕРґСЂРѕР±РЅРµР№")
//                                        ->setActionType('reply')
//                                        ->setActionBody('hppts://infomarketstudio.ru')
//                                        ->setTextSize('small');


                                    if (count($buttonsInl) > 0 && count($buttonsRep) > 0) {

                                        if (count($buttonsInl)>0 ) {
                                            $result = $botViber->getClient()->sendMessage(
                                                (new CarouselContent())
                                                    ->setSender($botSender)
                                                    ->setReceiver($user_id)
                                                    ->setTrackingData('treck')
                                                    ->setButtonsGroupColumns($btn_size)
                                                    ->setButtonsGroupRows(2)
                                                    ->setButtons($buttonsInl)

                                            );
                                        }elseif (count($buttonsRep)>0 ) {
                                            $result = $botViber->platform->getClient()->sendMessage(
                                                (new CarouselContent())
                                                    ->setSender($botSender)
                                                    ->setReceiver($user_id)
                                                    ->setTrackingData('treck')
                                                    ->setButtonsGroupColumns($btn_size)
                                                    ->setButtonsGroupRows(2)
                                                    ->setKeyboard(
                                                        (new Keyboard())
                                                            ->setButtons($buttonsRep)
                                                    )
                                            );
                                        }


                                    }


                                    \Yii::info("  VIBER  result " . print_r($result, true), 'infostudiobot');

                                    $result = Request::emptyResponse();

                                    break;

                            }
                        }
                    }
                }
                \Yii::info(" end  ", 'chat');


        }

        return $result;


    }

    private function ShowRandomImage($dir)
    {
        $image_list = scandir($dir);
        return $dir . "/" . $image_list[mt_rand(2, count($image_list) - 1)];
    }


}