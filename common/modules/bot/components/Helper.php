<?php
/**
 * @link https://github.com/AnatolyRugalev
 * @copyright Copyright (c) AnatolyRugalev
 * @license https://tldrlegal.com/license/gnu-general-public-license-v3-(gpl-3)
 */

namespace common\modules\bot\components;
use common\models\User;
use common\modules\bot\Bot;
use common\modules\bot\components\facebook\FbBotApp;
use common\modules\bot\components\facebook\Menu\LocalizedMenu;
use common\modules\bot\components\facebook\Menu\MenuItem;
use common\modules\bot\components\facebook\Messages\ImageMessage;
use common\modules\bot\components\facebook\Messages\Message;
use common\modules\bot\components\facebook\Messages\MessageButton;
use common\modules\bot\components\facebook\Messages\QuickReply;
use common\modules\bot\components\facebook\Messages\StructuredMessage;
use common\modules\bot\models\BotButtons;
use common\modules\bot\models\BotChat;

use common\modules\bot\models\BotOrder;

use common\modules\bot\models\BotChatUser;
use common\modules\bot\models\BotScreens;

use common\modules\bot\models\BotTarif;
use common\modules\bot\models\ButtonsToUser;
use common\modules\bot\models\Client;
use common\modules\bot\models\Settings;

use common\modules\bot\models\UserBot;
use common\modules\bot\models\UserBotSearch;
use common\modules\bot\models\WidgetText;
use common\modules\bot\Request;
use common\modules\chat\models\Clients;
use FacebookAds\Object\Lead;
use yii\base\Component;
use common\modules\bot\components\telegram\Entities\ReplyKeyboardMarkup;
use common\modules\bot\components\telegram\Entities\InlineKeyboardMarkup;
use common\modules\bot\components\telegram\Entities\InlineKeyboardButton;

use yii\base\Exception;


use FacebookAds\Object\Page;
use FacebookAds\Api;
use FacebookAds\Logger\CurlLogger;

/**
 * Class Client TODO: Write class description
 * @author Anatoly Rugalev
 * @link https://github.com/AnatolyRugalev
 */
class Helper extends Component
{

    public static function getUserZnak($user_id){
        $user = UserBot::find()->where(['id'=>$user_id])->one();
        if ($user) {
            return $user->role;
        } else {
            print_r('cancel'.$user_id);
            return  false;
        }

    }

    public static function url_slug($str, $options = array()) {
            // Make sure string is in UTF-8 and strip invalid UTF-8 characters
            $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

            $defaults = array(
                'delimiter' => '_',
                'limit' => null,
                'lowercase' => true,
                'replacements' => array(),
                'transliterate' => true,
            );

            // Merge options
            $options = array_merge($defaults, $options);

            $char_map = array(
                // Latin
                'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
                'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
                'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
                'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
                'ß' => 'ss',
                'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
                'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
                'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
                'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
                'ÿ' => 'y',
                // Latin symbols
                '©' => '(c)',
                // Greek
                'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
                'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
                'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
                'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
                'Ϋ' => 'Y',
                'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
                'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
                'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
                'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
                'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
                // Turkish
                'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
                'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
                // Russian
                'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
                'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
                'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
                'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
                'Я' => 'Ya',
                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
                'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
                'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
                'я' => 'ya',
                // Ukrainian
                'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
                'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
                // Czech
                'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
                'Ž' => 'Z',
                'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
                'ž' => 'z',
                // Polish
                'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
                'Ż' => 'Z',
                'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
                'ż' => 'z',
                // Latvian
                'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
                'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
                'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
                'š' => 's', 'ū' => 'u', 'ž' => 'z'
            );

            // Make custom replacements
            $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

            // Transliterate characters to ASCII
            if ($options['transliterate']) {
                $str = str_replace(array_keys($char_map), $char_map, $str);
            }

            // Replace non-alphanumeric characters with our delimiter
            $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

            // Remove duplicate delimiters
            $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

            // Truncate slug to max. characters
            $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

            // Remove delimiter from ends
            $str = trim($str, $options['delimiter']);

            return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
        }

    public static function getToken(){
        $models = Settings::find()->one();
        if($models){
            return $models;
        }

    }

    public static function addUser($client,$user_id, $firstname='',$lastname='', $cookie=false)
    {
        \Yii::info("ADD USER !!!! platform {$client} id {$user_id} cookie {$cookie}" , 'chat');

        $user =  UserBotSearch::find()->where(['id' => $user_id,'platform'=>$client])->one();//
        if (!$user) {
             if ($client == 'vk' || $client == 'facebook') {

                 $botchat = BotChat::find()->where(['id'=>$user_id])->all();
                 if (!$botchat) {
                     $userchat = new BotChat();
                     $userchat->id = $user_id;
                     $userchat->type = 'private';

                     if (!$userchat->save()) {
                        // \Yii::error("no save_data !!!! user" . print_r($userchat->getErrors(), true), 'chat');
                     }else{
                         \Yii::info("Пользователь добавлен bot-chat" , 'chat');
                     }
                 }

             }




            $user = new UserBot();

            if ( $client == 'facebook') {

                \Yii::info("Пользователь facebook get profile " , 'chat');
                $bot = new FbBotApp( env('BOT_TOKEN_FB'));
                $profile = $bot->userProfile($user_id);


                if (isset($profile->getData()['first_name']) ) {
                    \Yii::info(print_r($profile->getData()['first_name'],true), 'chat');
                    $user->first_name =$profile->getData()['first_name'];
                    $user->last_name =  isset($profile->getData()['last_name'])?$profile->getData()['last_name']:$lastname;
                } else {
                    $user->first_name = $firstname;
                    $user->last_name = $lastname;
                }

            }else{
                $user->first_name = $firstname;
                $user->last_name = $lastname;
            }


            $user->id = $user_id;
            $user->platform = $client;
            $user->status = 0;

            if($cookie){$user->cookie = $cookie;}

            if (!$user->save()) {
               // \Yii::error("no save_data !!!! user" . print_r($user->getErrors(), true), 'chat');
            }else{
                \Yii::info("Пользователь добавлен user bot" , 'chat');
            }

        }else{

            \Yii::info("Пользователь найден" , 'chat');


            $user->platform = $client;
            if($cookie){$user->cookie = $cookie;}

            if (!$user->update()) {
               // \Yii::info("no update !!!! user" . print_r($user->getErrors(), true), 'chat');
            }else{
                \Yii::info("Пользователь update" , 'chat');
            }


        }


    }

    public static function addUserViber($user_id,$user_name,$platform)
    {

        $user = UserBot::find()->where(['viber_id' => $user_id,'platform'=>$platform])->one();
        if (!$user) {

            $user = new UserBot();
            $user->id = mktime();
            $user->first_name= $user_name;
            $user->viber_id = $user_id;
            $user->platform = $platform;
            if (!$user->save()) {
                \Yii::info("no save_data !!!! user" . print_r($user->getErrors(), true), 'infostudiobot');
            }
        }


    }

    public static function addButtonsToUser($user_id,$platform)
    {

        $model_btn_user = ButtonsToUser::find()->where(['user_id' => $user_id])->all();
        // \Yii::info(" BUTTONS -" . print_r($model_btn_user,true), 'chat');


        if (!$model_btn_user) {

            $btu = new ButtonsToUser();
            $btu->key = 'models';
            $btu->status = 1;
            $btu->buttons_id = 109; // !!!!!!!!!!!!!
            $btu->user_id = $user_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }
            $btu = new ButtonsToUser();
            $btu->key = 'zakazchik';
            $btu->status = 1;
            $btu->buttons_id = 110; // !!!!!!!!!!!!!
            $btu->user_id = $user_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }

            //  меню модели

            $btu = new ButtonsToUser();
            $btu->key = 'profile';
            $btu->status = 0;
            $btu->buttons_id = 111; // !!!!!!!!!!!!!
            $btu->user_id = $user_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }
            $btu = new ButtonsToUser();
            $btu->key = 'projectsmodel';
            $btu->status = 0;
            $btu->buttons_id = 112; // !!!!!!!!!!!!!
            $btu->user_id = $user_id;
            if (!$btu->save()) {
                \Yii::info(" " . $btu->getErrors(), 'chat');
            }

            $btu = new ButtonsToUser();
            $btu->key = 'projects';
            $btu->status = 0;
            $btu->buttons_id = 113; // !!!!!!!!!!!!!
            $btu->user_id = $user_id;
            if (!$btu->save()) {
                \Yii::info(" " . $btu->getErrors(), 'chat');
            }

            $btu = new ButtonsToUser();
            $btu->key = 'projectsall';
            $btu->status = 0;
            $btu->buttons_id = 116; // !!!!!!!!!!!!!
            $btu->user_id = $user_id;
            if (!$btu->save()) {
                \Yii::info(" " . $btu->getErrors(), 'chat');
            }


            // заказчика меню

            $btu = new ButtonsToUser();
            $btu->key = 'create_projects';
            $btu->status = 0;
            $btu->buttons_id = 142; // !!!!!!!!!!!!!
            $btu->user_id = $user_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }

        }

    }

    public static function getBtnVk(array $buttons = [],$type = 'text')
    {


        $tmp = [];
        $btnarr = [];
        foreach ($buttons as $key => $button) {

            if ($type=='open_url') {
                $btnarr[][] = [
                    'action' => [
                        'type' => $type,
                        'label' => $button,
                        'url'=> $key
                    ]
                ];
            } else {
                $btnarr[][] = [
                    'action' => [
                        'type' => $type,
                        'payload' => json_encode(['button' => $key], JSON_UNESCAPED_UNICODE),
                        'label' => $button
                    ]
                ];
            }


        }

        if (count($buttons)) {
            $tmp[] = $btnarr;
        } else {
            $tmp = $btnarr;
        }

        $btn = [
            'one_time' => true,
            'buttons' => $btnarr,
        ];


        \Yii::info("BUTTONS  ---   " . print_r($btn, true), 'chat');


        return json_encode($btn, JSON_UNESCAPED_UNICODE);
    }

    public static function GetText($key,$title=false){
        $body_text='';
        $model =  WidgetText::findOne(['key' => $key, 'status' => WidgetText::STATUS_ACTIVE]);
        if ($model) {
            $body_text= $model->body;
            $title_text= $model->title;

        }
        if($title){
            return ['title'=>$title_text,'body'=>$body_text];
        }else{
            return $body_text;
        }


        return false;
    }

    public static function getScreenFromKey($key,$platform = 'telegram'){

        $screen = \common\modules\bot\models\BotScreens::find()->where(['key' => $key,'platform'=>$platform])->one();
        if ($screen) {
            return $screen->id;

        }



        return false;
    }

    public static function getKeyBoard($mesid)
    {

        //\Yii::info("getKeyBoard", 'chat');

        $data=[];


        $replyButtons = self::getReplyButtons($mesid);
        if ($replyButtons !== false) {
            $data['reply_markup'] = new ReplyKeyboardMarkup(
                [
                    'keyboard' => $replyButtons ,
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false,
                    'selective' => false
                ]
            );


        }


        $inlineButtons = self::getInlineButtons($mesid);



        if ($inlineButtons !== false) {
            $data['reply_markup'] =  new InlineKeyboardMarkup(
                [
                    'inline_keyboard' =>$inlineButtons
                ]
            );

        }
        // \Yii::info("    getKeyBoard " . print_r($data, true), 'chat');

        return $data;
    }

    public static function getInlineButtons($message_id)
    {

        \Yii::info("getInlineButtons message_id -- {$message_id}", 'chat');

        $keyboard = false;


        if($message_id==2){
            $buttons_Inline = BotButtons::find()->
            join('join','buttons_to_user', 'buttons_to_user.buttons_id = bot_buttons.id')->
            where(['widget_text_id' => $message_id])->
            andWhere(['not', ['type' => 'ReplyKeyboardMarkup']])->
            andwhere(['buttons_to_user.status' =>1])->
            asArray()->all();
        }else{
            $buttons_Inline = BotButtons::find()->

            where(['widget_text_id' => $message_id])->
            andWhere(['not', ['type' => 'ReplyKeyboardMarkup']])->

            asArray()->all();
        }






       // \Yii::info("    buttons_Inline " . print_r($buttons_Inline, true), 'chat');

        $btn_out_Inline = [];
        $i = 1;
        $k = 1;
        $j = 1;
        $btnarr = [];
        if (count($buttons_Inline) > 0) {
            foreach ($buttons_Inline as $key => $btn) {

                $btnarr['text'] = $btn['text'];

                if ($btn['type'] == 'InlineKeyboardMarkup_url') {
                    $btnarr['url'] = $btn['url'];
                } else {
                    unset($btnarr['url']);
                }
                $btnarr['callback_data'] = $btn['callback_data'];

                $btnObj = new InlineKeyboardButton($btnarr);


                switch ($btn['size']) {
                    case 'big':
                        $tmp[] = $btnObj;
                        if ($i % 1 == 0) {
                            $btn_out_Inline[] =$tmp;
                            unset($tmp);
                        }
                        $i++;
                        break;
                    case 'middle':
                        $tmp[] = $btnObj;
                        if ($k % 2 == 0) {
                            $btn_out_Inline[] =$tmp;
                            unset($tmp);
                        }
                        $k++;
                        break;
                    case 'small':
                        $tmp[] = $btnObj;
                        if ($j % 3 == 0) {
                            $btn_out_Inline[] =$tmp;
                            unset($tmp);
                        }
                        $j++;
                        break;
                    case 'minismall':
                        $tmp[] = $btnObj;
                        if ($j % 4 == 0) {
                            $btn_out_Inline[] =$tmp;
                            unset($tmp);
                        }
                        $j++;
                        break;
                }

            }
            $keyboard = $btn_out_Inline;
        }

       //  \Yii::info("    getInlineButtons " . print_r($keyboard, true), 'chat');
        return $keyboard;


    }

    public static function getFbButtons($message_id,$chat_id){
        $keyboard = false;

//        $buttons_Inline = \common\modules\bot\models\BotButtons::find()->joinWith(['bot_buttons_to_user'])->
//                                                             where(['bot_buttons.widget_text_id' => $message_id])->
//                                                            where(['bot_buttons_to_user.status' =>1])->
//                                                            andWhere(['not', ['bot_buttons.type' => 'ReplyKeyboardMarkup']])->
//                                                            limit(3)->asArray()->all();

        $buttons_Inline = \common\modules\bot\models\BotButtons::find()->
        where(['widget_text_id' => $message_id])->
        andWhere(['not in',  'type' , 'ReplyKeyboardMarkup' ])->
        limit(5)->asArray()->all();


        if (count($buttons_Inline) > 0) {
            foreach ($buttons_Inline as $key => $btn) {
                $keyboard[] = new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend',$btn['text'],[],Helper::GetLanguage($chat_id)) ,$btn['callback_data']);
            }

        }

       //  \Yii::info("    getFbButtons " . print_r($keyboard, true), 'chat');
        return $keyboard;
    }

    public static function getReplyButtons($message_id)
    {

       // \Yii::info("getReplyButtons", 'chat');

        $keyboard = false;

        if($message_id==2){
            $buttons_Reply = BotButtons::find()->
            join('join','buttons_to_user', 'buttons_to_user.buttons_id = bot_buttons.id')->
            where(['widget_text_id' => $message_id, 'type' => 'ReplyKeyboardMarkup'])->
            andwhere(['buttons_to_user.status' =>1])->
            asArray()->all();
        }else{
            $buttons_Reply = BotButtons::find()->

            where(['widget_text_id' => $message_id, 'type' => 'ReplyKeyboardMarkup'])->

            asArray()->all();
        }



        $btn_out_Reply = [];
        $i = 1;
        $k = 1;
        $j = 1;
        $btnarr = [];
        if (count($buttons_Reply) > 0) {
            foreach ($buttons_Reply as $key => $btn) {

                $btnarr['text'] = $btn['text'];
                $btnarr['request_contact'] = (bool)$btn['request_contact'];
                $btnarr['request_location'] = (bool)$btn['request_location'];



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
            //   \Yii::info("sendMessage buttons_Reply " . print_r($btn_out_Reply, true), 'chat');
            $keyboard = $btn_out_Reply;


        }

        // \Yii::info("    getReplyButtons " . print_r($keyboard, true), 'chat');
        return $keyboard;
    }

    public static function dialog($text=''){
        try {
            $client = new \DialogFlow\Client('fbac2f73e82f4b3ebb91a339ff57a708');
            $queryApi = new QueryApi($client);

            $meaning = $queryApi->extractMeaning($text, [
                'sessionId' => '1234567890',
                'lang' => 'ru',
            ]);
            $response = new Query($meaning);


            $out = $response->getResult()->getFulfillment()->getSpeech();

            return $out."\r\n";


//                $queryApi = new QueryApi($client);
//                $actionMapping = new CustomActionMapping();
//                $dialog = new Dialog($queryApi, $actionMapping);
//
//                // Start dialog ..
//                $dialog->create('1234567890',$text, 'ru');



        } catch (\Exception $error) {
            echo "Error ".$error->getMessage();
        }
    }

    public static function setButtonsDefault($chat_id)
    {
        $model_btn_user = ButtonsToUser::find()->where(['chat_id' => $chat_id])->one();

        if (!$model_btn_user) {

            $btu = new ButtonsToUser();
            $btu->key = 'reg';
            $btu->status = 1;
            $btu->buttons_id = 1; // !!!!!!!!!!!!!
            $btu->chat_id = $chat_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }
            $btu = new ButtonsToUser();
            $btu->key = 'vin';
            $btu->status = 1;
            $btu->buttons_id = 2; // !!!!!!!!!!!!!
            $btu->chat_id = $chat_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }
            $btu = new ButtonsToUser();
            $btu->key = 'profile';
            $btu->status = 1;
            $btu->buttons_id = 3; // !!!!!!!!!!!!!
            $btu->chat_id = $chat_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }
            $btu = new ButtonsToUser();
            $btu->key = 'o-kompanii';
            $btu->status = 1;
            $btu->buttons_id = 4; // !!!!!!!!!!!!!
            $btu->chat_id = $chat_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }
            $btu = new ButtonsToUser();
            $btu->key = 'order';
            $btu->status = 1;
            $btu->buttons_id = 43; // !!!!!!!!!!!!!
            $btu->chat_id = $chat_id;
            if (!$btu->save()) {
                \Yii::info("  " . $btu->getErrors(), 'chat');
            }





        }
    }

    public static function getScreen($chat_id,$key){


        $result=NULL;
        $screen_id = Helper::getScreenFromKey($key);
        $messages = \common\modules\bot\models\WidgetText::find()->where(['screens_id' => $screen_id, 'status' => 1])->orderBy(['sort' => 'DESC'])->all();
        $btnVk = [];
        foreach ($messages as $mes) {


            $txt = Helper::GetText($mes->key);
            \Yii::info("    sendMessage message_id {$mes->id}   text -  {$txt}", 'chat');
            $data = Helper::getKeyBoard($mes->id);

            $count = $mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->count();
            $data['chat_id'] = $chat_id;
            $keyboard = [];
            //
            $buttons_Reply = BotButtons::find()->
            where(['widget_text_id' => $mes->id, 'type' => 'ReplyKeyboardMarkup'])->asArray()->all();

            \Yii::info("    buttons_Reply  ".print_r($buttons_Reply,true), 'chat');
            $btn_out_Reply = [];
            $i = 1;
            $k = 1;
            $j = 1;
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
            //\Yii::info("РџРћР”Р“РћРўРћР’Р›Р•Рќ РљРќРћРџРљР  " . print_r($btn, true), 'chat');

            $settings = Helper::getToken();
            $vk =new  \common\modules\bot\components\vk\Bot("vk");
            if ($count) {
                foreach ($mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {
                    if ($image->type == 'image/jpeg' || $image->type == 'image/gif' || $image->type == 'image/png') {

                                $result = $vk->uploadPhoto($chat_id,$image->getPath() , $image->id);
                                if (isset($result['id'])) {
                                    $attachments = 'photo' . $result['owner_id'] . '_' . $result['id'];
                                    $result = $vk->vkApi_messagesSend($chat_id, '-' . 57982168, $txt, json_encode($btnVk, JSON_UNESCAPED_UNICODE), false, $settings->group_id, $attachments);

                                }
                                 $result = Request::emptyResponse();


                    }

                }
            } else {
                if ($txt) {
                    \Yii::info("    sendMessage " . print_r($txt, true), 'chat');

                            \Yii::info("    отправляем сообщение user " .$chat_id.' peer_id '.' -57982168 текст '. print_r($txt, true), 'chat');
                            \Yii::info("    кнопки " .    print_r(json_encode($btn, JSON_UNESCAPED_UNICODE), true), 'chat');
                            $result = $vk->vkApi_messagesSend($chat_id, '-57982168', $txt, json_encode($btnVk, JSON_UNESCAPED_UNICODE));
                            $result = Request::emptyResponse();




                }
            }
        }



        return $result;
    }

    public static function getScreenWhatsapp($chat_id,$key){

        $token = env("WHATSAPP_TOKEN");

        $result=NULL;
        $screen_id = Helper::getScreenFromKey($key,'whatsapp');

        $messages = \common\modules\bot\models\WidgetText::find()->where(['screens_id' => $screen_id, 'status' => 1])->orderBy(['sort' => 'DESC'])->all();
        $btnVk = [];
        $txt = '';
        foreach ($messages as $mes) {

            $user = UserBot::findOne($chat_id);

                $txt = Helper::GetText($mes->key);
                \Yii::info("    sendMessage message_id {$mes->id}   text -  {$txt}", 'chat');

                $count = $mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->count();



                if ($count) {
                    foreach ($mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {
                        if ($image->type == 'image/jpeg' || $image->type == 'image/gif' || $image->type == 'image/png') {
                            \Yii::info("    sendImage " . print_r($txt, true), 'chat');


                            $result = Request::emptyResponse();


                        }

                    }
                } else {
                    if ($txt) {
                        \Yii::info("    sendMessage " . print_r($txt, true), 'chat');

                        self::sendMessageWhatsapp($txt, $chat_id);

                    }
                }




        }



        return $txt;
    }

    public static function getScreenIdWhatsapp($chat_id,$key){



        $screen_id = Helper::getScreenFromKey($key,'whatsapp');

        return $screen_id;
    }

    public static function sendMessageWhatsapp($text, $user_id) {

        \Yii::info("  sendMessageWhatsapp  ---   " . $text.'to '.$user_id, 'chat');
        $client = new \yii\httpclient\Client() ;
        $response = $client->createRequest()
            ->setMethod('post')
            ->setUrl('https://api.chat-api.com/instance' . env('WHATSAPP_INSTANS') . '/sendMessage?token=' . env('WHATSAPP_TOKEN'))
            ->setData(['chatId' =>$user_id, 'body' => $text ])
            ->send();
        if ($response->isOk) {
            \Yii::info("data ".print_r( $response->data, true), 'chat');
        }
        return Request::emptyResponse();
    }

    public static function getScreen2($chat_id,$key,$mes_id=0,$returnBtn=false){

        \Yii::info("    getScreen2 " . print_r($key, true), 'infostudiobot');

        $result=NULL;
        $screen_id = Helper::getScreenFromKey($key);
        $messages = \common\modules\bot\models\WidgetText::find()->where(['screens_id' => $screen_id, 'status' => 1])->orderBy(['sort' => 'DESC'])->all();
        foreach ($messages as $mes) {

            if($mes_id == 0){
                $txt_out = Helper::GetText($mes->key);
                \Yii::info("    sendMessage message_id {$mes->id}   text -  {$txt_out}", 'infostudiobot');
                $data =  Helper::getKeyBoard($mes->id);

                if($returnBtn){
                    return Helper::getKeyBoard($mes->id);
                }

                $count = $mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->count();
                $data['chat_id'] =$chat_id;
                if ($count){
                    foreach ($mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {
                        if ($image->type == 'image/jpeg' || $image->type == 'image/gif' || $image->type == 'image/png' ) {
                            $data['photo'] = $image->getUrl();
                            $data['caption'] = $txt_out;
                            \Yii::info("    sendPhoto " . print_r($data['photo'], true), 'infostudiobot');
                            $result = Request::sendPhoto($data);
                        }
                        if ($image->type == 'video/mp4') {
                            $data['video'] = $image->getUrl();
                            $data['caption'] = $txt_out;
                            \Yii::info("    sendVideo " . print_r($data['video'], true), 'infostudiobot');
                            $result = Request::sendVideo($data);
                        }
                    }
                }else{
                    if($txt_out){
                        \Yii::info("    sendMessage " . print_r($txt_out, true), 'infostudiobot');
                        $data['text'] =$txt_out;
                        $result =   Request::sendMessage($data);
                    }
                }
            }else{

                if($mes->id == $mes_id){
                    $txt_out = Helper::GetText($mes->key);
                    \Yii::info("    sendMessage message_id {$mes->id}   text -  {$txt_out}", 'infostudiobot');
                    $data =  Helper::getKeyBoard($mes->id);
                    $count = $mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->count();
                    $data['chat_id'] =$chat_id;
                    if ($count){
                        foreach ($mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {
                            if ($image->type == 'image/jpeg' || $image->type == 'image/gif' || $image->type == 'image/png' ) {
                                $data['photo'] = $image->getUrl();
                                $data['caption'] = $txt_out;
                                \Yii::info("    sendPhoto " . print_r($data['photo'], true), 'infostudiobot');
                                $result = Request::sendPhoto($data);
                            }
                            if ($image->type == 'video/mp4') {
                                $data['video'] = $image->getUrl();
                                $data['caption'] = $txt_out;
                                \Yii::info("    sendVideo " . print_r($data['video'], true), 'infostudiobot');
                                $result = Request::sendVideo($data);
                            }
                        }
                    }else{
                        if($txt_out){
                            \Yii::info("    sendMessage " . print_r($txt_out, true), 'infostudiobot');
                            $data['text'] =$txt_out;
                            $result =   Request::sendMessage($data);
                        }
                    }
                }

            }

        }// for



        return $result;
    }

    public static function checkUser($login,$pass)
    {

        if(empty($pass))return false;



        $user = Helper::getUser($login);
        if ($user && $user->validatePassword($pass)) {
            return $user;

        }

        return false;
    }

    public static function getUser($login)
    {
        $user = User::find()
            ->active()
            ->andWhere(['or', ['username' => $login]])
            ->one();
        if ($user === false) {
            return false;
        }

        return $user;
    }

    public static function sendNotify($chat_id = false,$text){
        Request::initializeTelegram(new Bot());


        if($chat_id){
            $data['chat_id'] = $chat_id;
            $data['text'] = $text;
            $data['reply_markup'] = new ReplyKeyboardMarkup(
                [
                    'keyboard' => [['Главное меню']] ,
                    'resize_keyboard' => true,
                    'one_time_keyboard' => false,
                    'selective' => false
                ]
            );
            $result = Request::sendMessage($data);
        }else{

            $model = Userbot::find()->where(['!=','id', 604626950])->asArray()->all();

            foreach ($model as $user){

                $data['chat_id'] = $user['id'];
                $data['text'] = $text;
//                $data['reply_markup'] = new ReplyKeyboardMarkup(
//                    [
//                        'keyboard' => [['Главное меню']] ,
//                        'resize_keyboard' => true,
//                        'one_time_keyboard' => false,
//                        'selective' => false
//                    ]
//                );
                $data['reply_markup'] =  new InlineKeyboardMarkup(
                    [
                        'inline_keyboard' =>[
                            [new InlineKeyboardButton(['text'=>'Кнопка','callback_data'=>'btn'])]
                        ]
                    ]
                );
                $result = Request::sendMessage($data);
                $data=[];
            }


        }
        return ['ok'];

    }

    public static function sendNotifyVk($chat_id = false,$text,$group_id=57982168){


        $vk =new  \common\modules\bot\components\vk\Bot("vk");
        $btn = [
            'one_time' => true,
            'buttons' => [

//                [
//
//
//                    [
//                        'action' => [
//                            'type' => 'text',
//                            'payload' => json_encode(['button' => "menu"], JSON_UNESCAPED_UNICODE),
//                            'label' => 'Кнопка'
//                        ],
//                        "color"=> "primary" ,
//                    ],
//
//
//                ]
            ],
        ];

        if($chat_id){

            $result = $vk->vkApi_messagesSend($chat_id, '-' . $group_id, $text, json_encode($btn, JSON_UNESCAPED_UNICODE));
        }else{

            $model = Userbot::find()->asArray()->all();

            foreach ($model as $user){

                $chat_id = $user['id'];
                $result = $vk->vkApi_messagesSend($chat_id, '-' . $group_id, $text, json_encode($btn, JSON_UNESCAPED_UNICODE));
            }


        }
        return $result;

    }

    public static function addPodarokOrderAmo ($tag,$order,$user_id,$platform='telegram') {
        $myuser = UserBot::find()->where(['id'=>$user_id,'platform'=>$platform])->one();



        if ($myuser->username<>'') {

            $user = $myuser->username;
        } else {
            \Yii::info("myuser->lastname" . $myuser->first_name.$myuser->last_name  , 'chat');

            if ($myuser->first_name.$myuser->last_name <> '') {
                $user = $myuser->first_name.' '.$myuser->last_name;
            } else {

                \Yii::info("myuser->first_name.myuser->last_name <> ''" . $myuser->first_name.$myuser->last_name <> '' , 'chat');

                $user = 'noname';
            }
        }

        $amount = 0;
        $txt = '';
        $tagc = '';
        switch ($tag) {
            case "orderpartner":
                $amount = BotTarif::find()->where(['slug'=>'partner'])->one()->amount;
                $tagc = 'Подарок - Гороскоп совместимости';
                $txt = 'Подарок - Заявка на горокоп совместимости';
                break;
            case "orderdetiy":
                $amount = BotTarif::find()->where(['slug'=>'detiy'])->one()->amount;
                $tagc = 'Подарок - Детский гороскоп';
                $txt = 'Подарок - Заявка на детский гороскоп';
                break;
            case "orderzdorova":
                $amount = BotTarif::find()->where(['slug'=>'zdorova'])->one()->amount;
                $tagc = 'Подарок - Гороскоп здоровья';
                $txt = 'Подарок - Заявка на гороскоп здоровья';
                break;
            case "orderkarery":
                $amount = BotTarif::find()->where(['slug'=>'karery'])->one()->amount;
                $tagc = 'Подарок - Гороскоп карьеры';
                $txt = 'Подарок - Заявка на гороскоп карьеры';
                break;
        }

        try {
            // Получение экземпляра модели для работы с аккаунтом
            $amo = \Yii::$app->amocrm->getClient();
            $account = $amo->account;

            // или прямо
            $account = \Yii::$app->amocrm->account;

            // Вывод информации об аккаунте
            //  print_r($account->apiCurrent());


            $search_cont = $amo->contact->apiList([
                'query' => $user_id,
                'limit_rows' => 1,
            ] );

            if (!$search_cont) {
                // Получение экземпляра модели для работы с контактами
                $contact = $amo->contact;
                \Yii::info("myuser->username" . $myuser->username  , 'chat');


                // Заполнение полей модели
                $contact['name'] = $user;
                $contact['id'] = $myuser->id;

                $contact['responsible_user_id'] = $amo->fields['ResponsibleUserId'];
                $contact['tags'] = $tagc;

                if (isset($myuser->id)) {
                    $contact->addCustomField(615995, $myuser->id);
                }
                $contact->addCustomField(616029,$order->email );

                \Yii::info("        contact ".print_r($contact,true), 'chat');

                try {
                    $new_contact = $contact->apiAdd();
                } catch (\AmoCRM\Exception $e) {
                    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
                }
                // Добавление нового контакта и получение его ID



            } else {
                \Yii::info("        contact exist".print_r($search_cont[0]['id'],true), 'chat');

                $new_contact = $search_cont[0]['id'];
            }



            $lead = $amo->lead;
            $lead->debug(false); // Режим отладки
            $lead['name'] = $user;
            $lead['price'] = $amount;
            $lead['responsible_user_id'] = $amo->fields['ResponsibleUserId'];
            $lead['tags'] = $tagc;


            $lead->addCustomField(634629,$order->name );
            $lead->addCustomField(630933,$platform );
            $lead->addCustomField(634631,$order->name_partner );
            $lead->addCustomField(634633,$order->anonymous );
            $lead->addCustomField(634637,$order->vidhoroscope );
            $lead->addCustomField(634635,$order->email );
            $lead->addCustomField(634639,$order->promo);



            $new_lead = $lead->apiAdd();

            $link = $amo->links;
            $link['from'] = 'leads';
            $link['from_id'] = $new_lead;
            $link['to'] = 'contacts';
            $link['to_id'] = $new_contact;
            $id = $link->apiLink();


            print_r('lead - '.$id);

        } catch (\AmoCRM\Exception $e) {
            printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
        }



    }

    public static function addActivPodarokOrderAmo ($tag,$order,$user_id,$platform='telegram') {
        $myuser = UserBot::find()->where(['id'=>$user_id,'platform'=>$platform])->one();
        if ($myuser->username<>'') {

            $user = $myuser->username;
        } else {
            \Yii::info("myuser->lastname" . $myuser->first_name.$myuser->last_name  , 'chat');

            if ($myuser->first_name.$myuser->last_name <> '') {
                $user = $myuser->first_name.' '.$myuser->last_name;
            } else {

                \Yii::info("myuser->first_name.myuser->last_name <> ''" . $myuser->first_name.$myuser->last_name <> '' , 'chat');

                $user = 'noname';
            }
        }

        $amount = 0;
        $txt = '';
        $tagc = '';
        switch ($tag) {
            case "orderpartner":
                $amount = BotTarif::find()->where(['slug'=>'partner'])->one()->amount;
                $tagc = 'Акт. Подарок - Гороскоп совместимости';
                $txt = 'Акт. Подарок - Заявка на горокоп совместимости';
                break;
            case "orderdetiy":
                $amount = BotTarif::find()->where(['slug'=>'detiy'])->one()->amount;
                $tagc = 'Акт. Подарок - Детский гороскоп';
                $txt = 'Акт. Подарок - Заявка на детский гороскоп';
                break;
            case "orderzdorova":
                $amount = BotTarif::find()->where(['slug'=>'zdorova'])->one()->amount;
                $tagc = 'Акт. Подарок - Гороскоп здоровья';
                $txt = 'Акт. Подарок - Заявка на гороскоп здоровья';
                break;
            case "orderkarery":
                $amount = BotTarif::find()->where(['slug'=>'karery'])->one()->amount;
                $tagc = 'Акт. Подарок - Гороскоп карьеры';
                $txt = 'Акт. Подарок - Заявка на гороскоп карьеры';
                break;
        }

        try {
            // Получение экземпляра модели для работы с аккаунтом
            $amo = \Yii::$app->amocrm->getClient();
            $account = $amo->account;

            // или прямо
            $account = \Yii::$app->amocrm->account;

            // Вывод информации об аккаунте
            //  print_r($account->apiCurrent());


            $search_cont = $amo->contact->apiList([
                'query' => $user_id,
                'limit_rows' => 1,
            ] );

            if (!$search_cont) {
                // Получение экземпляра модели для работы с контактами
                $contact = $amo->contact;
                \Yii::info("myuser->username" . $myuser->username  , 'chat');


                // Заполнение полей модели
                $contact['name'] = $user;
                $contact['id'] = $myuser->id;

                $contact['responsible_user_id'] = $amo->fields['ResponsibleUserId'];
                $contact['tags'] = $tagc;

                if (isset($myuser->id)) {
                    $contact->addCustomField(615995, $myuser->id);
                }

                $contact->addCustomField(616029,$order->email );

                \Yii::info("        contact ".print_r($contact,true), 'chat');

                try {
                    $new_contact = $contact->apiAdd();
                } catch (\AmoCRM\Exception $e) {
                    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
                }
                // Добавление нового контакта и получение его ID



            } else {
                \Yii::info("        contact exist".print_r($search_cont[0]['id'],true), 'chat');

                $new_contact = $search_cont[0]['id'];
            }



            $lead = $amo->lead;
            $lead->debug(false); // Режим отладки
            $lead['name'] = $user;
            $lead['price'] = $amount;
            $lead['responsible_user_id'] = $amo->fields['ResponsibleUserId'];
            $lead['tags'] = $tagc;


            $lead->addCustomField(616041,$order->name );
            $lead->addCustomField(630933,$platform );
           // $lead->addCustomField(616043,$order->date_birth );
            $lead->addCustomField(616045,$order->time_birth );
            $lead->addCustomField(616047,$order->place_birth);
            $lead->addCustomField(630983,$order->email);

            \Yii::info("        order->email ".print_r($order->email,true), 'chat');


            $new_lead = $lead->apiAdd();

            $link = $amo->links;
            $link['from'] = 'leads';
            $link['from_id'] = $new_lead;
            $link['to'] = 'contacts';
            $link['to_id'] = $new_contact;
            $id = $link->apiLink();


            print_r('lead - '.$id);

        } catch (\AmoCRM\Exception $e) {
            printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
        }



    }

    public static function addOrderAmo ($tag,$order,$user_id,$platform='telegram') {
        $myuser = UserBot::find()->where(['id'=>$user_id,'platform'=>$platform])->one();

        if (isset($myuser) && $myuser->username<>'') {

            $user = $myuser->username;
        } else {
            \Yii::info("myuser->lastname" . $myuser->first_name.$myuser->last_name  , 'chat');

            if ($myuser->first_name.$myuser->last_name <> '') {
                $user = $myuser->first_name.' '.$myuser->last_name;
            } else {

                \Yii::info("myuser->first_name.myuser->last_name <> ''" . $myuser->first_name.$myuser->last_name <> '' , 'chat');

                $user = 'noname';
            }
        }

        $amount = 0;
        $txt = '';
        $tagc = '';
        switch ($tag) {
            case "orderpartner":
                $amount = BotTarif::find()->where(['slug'=>'partner'])->one()->amount;
                $tagc = 'Гороскоп совместимости';
                $txt = 'Заявка на горокоп совместимости';
                break;
            case "orderdetiy":
                $amount = BotTarif::find()->where(['slug'=>'detiy'])->one()->amount;
                $tagc = 'Детский гороскоп';
                $txt = 'Заявка на детский гороскоп';
                break;
            case "orderzdorova":
                $amount = BotTarif::find()->where(['slug'=>'zdorova'])->one()->amount;
                $tagc = 'Гороскоп здоровья';
                $txt = 'Заявка на гороскоп здоровья';
                break;
            case "orderkarery":
                $amount = BotTarif::find()->where(['slug'=>'karery'])->one()->amount;
                $tagc = 'Гороскоп карьеры';
                $txt = 'Заявка на гороскоп карьеры';
                break;
        }

        try {
            // Получение экземпляра модели для работы с аккаунтом
            $amo = \Yii::$app->amocrm->getClient();
            $account = $amo->account;

            // или прямо
            $account = \Yii::$app->amocrm->account;

            // Вывод информации об аккаунте
          //  print_r($account->apiCurrent());


            $search_cont = $amo->contact->apiList([
                'query' => $user_id,
                'limit_rows' => 1,
            ] );

            if (!$search_cont) {
                // Получение экземпляра модели для работы с контактами
                $contact = $amo->contact;
                \Yii::info("myuser->username" . $myuser->username  , 'chat');


                // Заполнение полей модели
                $contact['name'] = $user;
                $contact['id'] = $myuser->id;

                $contact['responsible_user_id'] = $amo->fields['ResponsibleUserId'];
                $contact['tags'] = $tagc;

                if (isset($myuser->id)) {
                    $contact->addCustomField(615995, $myuser->id);
                }

                $contact->addCustomField(616029,$order->email );

                \Yii::info("        contact ".print_r($contact,true), 'chat');

                try {
                    $new_contact = $contact->apiAdd();
                } catch (\AmoCRM\Exception $e) {
                    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
                }
                // Добавление нового контакта и получение его ID



            } else {
                \Yii::info("        contact exist".print_r($search_cont[0]['id'],true), 'chat');

                $new_contact = $search_cont[0]['id'];
            }



            $lead = $amo->lead;
            $lead->debug(false); // Режим отладки
            $lead['name'] = $user;
            $lead['price'] = $amount;
            $lead['responsible_user_id'] = $amo->fields['ResponsibleUserId'];
            $lead['tags'] = $tagc;


            $lead->addCustomField(616041,$order->name );
            $lead->addCustomField(630933,$platform );
            $lead->addCustomField(616043,$order->date_birth );
            $lead->addCustomField(616045,$order->time_birth );
            $lead->addCustomField(616047,$order->place_birth);
            if ($tag =='orderpartner') {
                $lead->addCustomField(616049,$order->name_partner );
                $lead->addCustomField(616051,$order->date_birth_partner );
                $lead->addCustomField(616053,$order->time_birth_partner );
                $lead->addCustomField(616055,$order->place_birth_partner );
            }


            $new_lead = $lead->apiAdd();

            $link = $amo->links;
            $link['from'] = 'leads';
            $link['from_id'] = $new_lead;
            $link['to'] = 'contacts';
            $link['to_id'] = $new_contact;
            $id = $link->apiLink();


            print_r('lead - '.$id);

        } catch (\AmoCRM\Exception $e) {
            printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
        }



    }

    public static function addOrder($type,$notes,$platform = 'telegram') {

        $order = new BotOrder();
        $order->type = $type;
        $order->name = $notes['yourname'];
        $order->date_birth = $notes['date_birth'];
        $order->time_birth = $notes['time_birth'];
        $order->place_birth = $notes['place_birth'];
        if ($type=='orderpartner') {
            $order->name_partner = $notes['partner_name'];
            $order->date_birth_partner = $notes['partner_date_birth'];
            $order->time_birth_partner = $notes['partner_time_birth'];
            $order->place_birth_partner = $notes['partner_place_birth'];
        }

        $order->email = $notes['vvod_email'];
        $order->user_id = $notes['user_id'];

        if ($order->save()) {
            return $order;
        } else {
            \Yii::info("Профиль --  " . print_r($order->getErrors(),true), 'chat');
            return false;
        }
    }

    public static function addActivOrder($type,$notes,$platform = 'telegram') {

        $order = new BotOrder();
        $order->type = $type;
        $order->name = $notes['yourname'];
        $order->status=1;
      //  $order->date_birth = $notes['date_birth'];
        $order->time_birth = $notes['time_birth'];
        $order->place_birth = $notes['place_birth'];


        $order->email = $notes['vvod_email'];
        $order->user_id = $notes['user_id'];

        if ($order->save()) {
            return $order;
        } else {
            \Yii::info("Профиль --  " . print_r($order->getErrors(),true), 'chat');
            return false;
        }
    }

    public static function addPodarokOrder($type,$notes,$platform = 'facebook') {

        $order = new BotOrder();
        $order->type = $type;
        $order->name = $notes['nameto'];
        $order->vidhoroscope = $notes['horoscope'];
        $order->anonymous = $notes['anonymous'];
        $order->name_partner = isset($notes['namefrom'])?$notes['namefrom']:'';
        $order->promo = substr(md5(time().$notes['nameto'].$notes['horoscope']),0,5);

        $order->user_id = $notes['user_id'];
        $order->email = $notes['email'];

        if ($order->save()) {
            return $order;
        } else {
            \Yii::info("Профиль --  " . print_r($order->getErrors(),true), 'chat');
            return false;
        }
    }

    public static function getFbLead($id) {


        $access_token = 'EAAFqZCixZB6hABAI56HfyGNyiU8j1eHyW74cXmVRAv1lEHiZCsS2JbVHGNiOnoVZBoBjNCCttUu4KLxxZBziZCibIjJZCdssUvLRKmIBggWXLJR5e7rG7k3HopajIPW4vvcMfxcaZCAG0xlZAmGaCSo4jRxafwtdZCvp5agnxPTrooJDESuh63o0ehzTx1NFkZACqpsufq8xQClzAZDZD';
        $app_secret = 'd176b3183fea75dd72458e2d27e8eab5';
        $app_id = '399114877463056';
      //  $app_secret_proof = hash_hmac('sha256', $access_token, $app_secret);

        $api = Api::init($app_id, $app_secret, $access_token);


        print_r($api->getSession()->getRequestParameters(),true);

        $api->setLogger(new CurlLogger());


        $fields = array(
        );
        $params = array(
        );
        $data =   (new Lead($id))->getSelf($fields, $params)->exportAllData() ;


        \Yii::info("  lead fb page_id  ".print_r($data,true), 'chat');

            if (isset($data['field_data'][0])) {
    $sql = "
                
        
                select 3 into @user_id;
                select :name into @nam;
                select :phone into @phone;
                select 1 into @state;
                select :time1 into @time1;   
                select :time2 into @time2;   
                
                INSERT INTO `item` (  `createddatetime`, `modifieddatetime`, `createdbyuser__user_id`, `modifiedbyuser__user_id`) 
                VALUES (  @time1, @time2, @user_id, @user_id);
                
                SELECT LAST_INSERT_ID() INTO @item_id;
                
                INSERT INTO `securableitem` (  `item_id`) 
                VALUES (  @item_id);
                
                SELECT LAST_INSERT_ID() INTO @securableitem_id;
                
                INSERT INTO `ownedsecurableitem` (  `securableitem_id`, `owner__user_id`) 
                VALUES (  @securableitem_id, @user_id);
                
                SELECT LAST_INSERT_ID() INTO @ownedsecurableitem_id;
                
                INSERT INTO `person` (   `firstname`,  `lastname`, `mobilephone` , `ownedsecurableitem_id` ) 
                VALUES (  @nam, 'none', @phone, @ownedsecurableitem_id);
                
                SELECT LAST_INSERT_ID() INTO @person_id;
                
                select max(id)+1 into @basecustomfield_id from customfield;
                
                INSERT INTO `customfield` (  `value`, `basecustomfield_id`) VALUES (  'advertise', @basecustomfield_id );

                SELECT LAST_INSERT_ID() INTO @customfield_id;
                
                
                INSERT INTO `contact` (utmcontentcstm, utmtermcstm, utmmediumcstm, utmsourcecstm, utmcampaigncstm, source_customfield_id, state_contactstate_id,  `person_id` ) 
                VALUES ('leadform','chatbot','cpc','fb','main_page',@customfield_id, @state, @person_id );
       
            ";

    $id = \Yii::$app->dbcrm->createCommand($sql)
        ->bindValue(':name', $data['field_data'][0]['values'][0] )
        ->bindValue(':phone', $data['field_data'][1]['values'][0] ) //'2019-10-07 08:24:48'
        ->bindValue(':time1', date('Y-m-d H:i:s',time()))
        ->bindValue(':time2',date('Y-m-d H:i:s',time()) )
        ->execute();

    $bot = new \common\modules\bot\Bot('telegram');
    $databot = [];
    $databot['chat_id'] = 201378424;//'@chatbotbusiness'; //201378424;
    $databot['text'] ="Новый лид:\r\n".
                    "Источник: Лидформы Facebook\r\n".
                    "Имя: ".strip_tags($data['field_data'][0]['values'][0])."\r\n".
                    "Телефон: ".strip_tags($data['field_data'][1]['values'][0]) ;
    $databot['parse_mode'] = 'HTML';
    $result = Request::sendMessage($databot);


    $bot = new \common\modules\bot\Bot('telegram');
    $databot = [];
    $databot['chat_id'] = 47195363;//'@chatbotbusiness'; //201378424;
    $databot['text'] ="Новый лид:\r\n"."Источник: Лидформы Facebook\r\n"."Имя: ".strip_tags($data['field_data'][0]['values'][0])."\r\n"."Телефон: ".strip_tags($data['field_data'][1]['values'][0]) ;
    $databot['parse_mode'] = 'HTML';
    $result = Request::sendMessage($databot);

    \Yii::info("  lead   ".print_r($id,true), 'chat');
}


    }

    public static function addChatUser($user_id) {

        $botchat = BotChat::findOne($user_id);
        if (!$botchat) {
            $botchat = new  BotChat();
            $botchat->id = (integer)$user_id;
            $botchat->type = 'private';


            if (!$botchat->save()) {
                \Yii::info("no save_data !!!! botchat" . print_r($botchat->getErrors(), true), 'chat');
            }else{
                \Yii::info(",бот  Чат добавлен" , 'chat');
            }
        }
        $chatuser = BotChatUser::find()->where(['user_id'=>$user_id])->one();
        if (!$chatuser) {
            $chatuser =  new  BotChatUser();
            $chatuser->chat_id = (integer)$user_id;
            $chatuser->user_id = (integer)$user_id;


            if (!$chatuser->save()) {
                \Yii::info("no save_data !!!! chatuser" . print_r($chatuser->getErrors(), true), 'chat');
            }else{
                \Yii::info("Связка чат юзер добавлен" , 'chat');
            }
        }

    }

    public static function getStepByUser($user_id,$pl) {


            $ChatClients =  Clients::find()->where(['cookie'=>$user_id,'platform'=>$pl])->one();
            if($ChatClients){
                //Берем последний диалог клиента смотрим статус
                $dialog = \common\modules\chat\models\Dialogs::find()->where(['clients_id' => $ChatClients->id, 'dialogs_status_id' => 3, 'regim' => 'OPERATOR'])->one();
                // если статус активный смотрим сколько сообщений
                // было отправлено в рамках этого диалога
                if($dialog){
                    $messages = \common\modules\chat\models\Messages::find()->where(['dialogs_id' => $dialog->id, 'type' => 'out', 'to' => $user_id])->orderBy(['created_at' => SORT_DESC])->count();
                    return $messages;
                }

            }

            return false;

    }

    public static function getAvalibleKeysFromUser($user_id,$step) {





        return [];

    }

    public static function getAval($text){
        $screenkey = BotScreens::find()->where(['key'=>'whatsapp_start'])->one();
        $yesno   = [];

        if ($screenkey) {


            $screenmess = WidgetText::find()->where(['screens_id'=>$screenkey->id])->all();
            $btn = [];
            foreach ($screenmess as $mes) {
                $btn = BotButtons::find()->where(['widget_text_id'=>$mes->id])->asArray()->all();
            }
            \Yii::info("массив кнопок screen  ---   " . print_r($btn,true), 'chat');


            foreach ($btn as $button) {
                if ($text == $button['text'] || $text == $button['callback_data']) {
                    $yesno [] = $button['callback_data'];
                }

            }




        }
        return $yesno;
    }

    public static function getScreenFb($chat_id,$key,$lang = 'en-US'){

        \Yii::info("    getScreenFb   {$key}   chat_id -  {$chat_id}", 'chat');
        $result=NULL;
        $screen_id = Helper::getScreenFromKey($key,'facebook');
        $messages = \common\modules\bot\models\WidgetText::find()->where(['screens_id' => $screen_id, 'status' => 1])->orderBy(['sort' => 'DESC'])->all();
        $btnVk = [];
        foreach ($messages as $mes) {


            $txt = Helper::GetText($mes->key);
            \Yii::info("    sendMessage message_id {$mes->id}   text -  {$txt}", 'chat');
            $data = Helper::getKeyBoard($mes->id);

            $count = $mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->count();
            $data['chat_id'] = $chat_id;
            $keyboard = [];
            //



            $botfb = new FbBotApp(env('BOT_TOKEN_FB'));

            if ($count) {
                foreach ($mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {
                    if ($image->type == 'image/jpeg' || $image->type == 'image/gif' || $image->type == 'image/png') {

                        if (!empty($mes->body)){
                            $botfb->send(new ImageMessage($chat_id, $image->getUrl()));
                            if(Helper::getFbButtons($mes->id,$chat_id)){
                                $result = $botfb->send(new StructuredMessage($chat_id,
                                    StructuredMessage::TYPE_BUTTON,
                                    [
                                        'text' =>  \Yii::t('frontend',$mes->body,[],Helper::GetLanguage($chat_id) ),
                                        'buttons' => Helper::getFbButtons($mes->id,$chat_id)
                                    ]
                                ));
                            }else{
                                $botfb->send(new Message($chat_id, \Yii::t('frontend',$mes->body,[],Helper::GetLanguage($chat_id) )));
                            }
                        }else{
                            $botfb->send(new ImageMessage($chat_id, $image->getUrl()));
                        }
                        $result = Request::emptyResponse();


                    }

                }
            } else {
                if ($txt) {
                    \Yii::info("    sendMessage " . print_r($txt, true), 'chat');

                    \Yii::info("    отправляем сообщение user " .$chat_id.' peer_id '.' -57982168 текст '. print_r($txt, true), 'chat');

                    if(Helper::getFbButtons($mes->id,$chat_id)){
                        $result = $botfb->send(new StructuredMessage($chat_id,
                            StructuredMessage::TYPE_BUTTON,
                            [
                                'text' => \Yii::t('frontend',$mes->body,[],Helper::GetLanguage($chat_id)),
                                'buttons' => Helper::getFbButtons($mes->id,$chat_id)
                            ]
                        ));
                    }else{

                        $buttons_Reply = BotButtons::find()->
                        where(['widget_text_id' => $mes->id, 'type' => 'ReplyKeyboardMarkup'])->asArray()->all();

                        if (count($buttons_Reply) > 0) {
                            foreach ($buttons_Reply as $key => $btn) {
                                $quick_replies[] =  ['content_type'=>'text', 'title'=>$btn['text'], 'payload'=>$btn['callback_data']];
                            }
                            $botfb->send(new QuickReply($chat_id,\Yii::t('frontend',$mes->body,[],Helper::GetLanguage($chat_id) ),$quick_replies));
                        } else {
                            $botfb->send(new Message($chat_id, \Yii::t('frontend',$mes->body,[],Helper::GetLanguage($chat_id) )));
                        }
                    }
                }
            }
        }



        return $result;
    }

    public static function SetLanguage($user_id, $lang) {
        $user = UserBot::findOne($user_id);
        $user->lang = $lang;
        if (!$user->update()) {
            \Yii::info("    sendMessage " . print_r($user->getErrors(), true), 'chat');

        }
    }

    public static function GetLanguage($user_id ) {
        $user = UserBot::findOne($user_id);
        if ($user) {
            if (!isset($user->lang)) {
                return 'ru-RU';
            } else {
                return $user->lang;
            }

        } else {
            return false;
        }

    }

    public static function getMessageScreen($key, $platform) {
        $messarr = '';
        $screen = BotScreens::find()->where(['key'=>$key, 'platform'=>$platform])->one();
        if ($screen){
            $widgettext = WidgetText::find()->where(['screens_id'=>$screen->id])->all();
            foreach ($widgettext as $text) {
                $messarr .= $text->body;
            }
                return $messarr;
        } else {
            return '-';
        }


    }

    public static function CheckPromo($text,$user_id) {

        $order = BotOrder::find()->where(['promo'=>$text,'status'=>0])->one();
        if ($order) {
            return $order->promo;
        } else {
            return false;
        }

    }

    public static function RestorePromo($promo) {

        $order = BotOrder::find()->where(['promo'=>$promo,'status'=>0])->one();
        if ($order) {
            $order->status = 1;
            if (!$order->update()) {
                return false;
            } else {
                return $order->promo;
            }

        } else {
            return false;
        }

    }

    public static function GetHoroscope($vid, $lang) {




        if ($lang == 'en-US') {
            $arr = [
                'goroskop-sovmestimosti-partnerov'=>'Horoscope of compability',
                'detskij-goroskop'=>'Child horoscope',
                'goroskop-zdorova'=>'Health horoscope',
                'goroskop-karery'=>'Career horoscope'
            ];
            foreach ($arr as $key=>$val) {
                if ($key == $vid) {
                    return $val;
                }
            }

        }
        if ($lang == 'ru-RU') {

            $arr = [
                'goroskop-sovmestimosti-partnerov'=>'Гороскоп совместимости',
                'detskij-goroskop'=>'Детский гороскоп',
                'goroskop-zdorova'=>'Гороскоп здоровья',
                'goroskop-karery'=>'Гороскоп карьеры'
            ];

            foreach ($arr as $key=>$val) {
                if ($key == $vid) {
                    return $val;
                }
            }
        }
    }

    public static function GetHoroscopeVk($vid, $lang) {

        $arr = [
            'Гороскоп совместимости'=>'goroskop-sovmestimosti-partnerov',
            'Детский гороскоп'=>'detskij-goroskop',
            'Гороскоп здоровья'=>'goroskop-zdorova',
            'Гороскоп карьеры'=>'goroskop-karery'
        ];


        if ($lang == 'en-US') {

            return $vid;

        }
        if ($lang == 'ru-RU') {
            foreach ($arr as $key=>$val) {
                if ($val == $vid) {
                    return $key;
                }
            }
        }
    }

}
