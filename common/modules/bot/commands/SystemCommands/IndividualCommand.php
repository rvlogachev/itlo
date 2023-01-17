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

use common\modules\bot\components\facebook\FbBotApp;
use common\modules\bot\components\facebook\Messages\Message;
use common\modules\bot\components\facebook\Messages\MessageButton;

use common\modules\bot\components\facebook\Messages\MessageElement;

use common\modules\bot\components\facebook\Messages\QuickReply;
use common\modules\bot\components\facebook\Messages\StructuredMessage;
use common\modules\bot\Conversation;
use common\modules\bot\models\BotButtons;
use common\modules\bot\models\WidgetText;
use  common\modules\rbac\models\RbacAuthItem;
use  common\modules\chat\models\Dialogs;
use common\modules\bot\commands\SystemCommand;
use common\modules\bot\components\Helper;
use common\modules\bot\components\viber\Api\Message\Text;
use common\modules\bot\components\viber\Api\Sender;

use common\modules\bot\models\BotScreens;
use common\modules\bot\models\UserBot;
use common\modules\bot\Request;

use  common\modules\system\models\TimelineEvent;


/**
 * Start command
 */
class IndividualCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'individual';
    protected $description = 'individual command';
    protected $usage = '/individual';
    protected $version = '1.0.1';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {





        if ($this->platform->client == 'facebook') {

            $input = json_decode(file_get_contents('php://input'), true);

            //  \Yii::info(print_r($input['entry'],true), 'chat');

            $user_id = $input['entry'][0]['messaging'][0]['sender']['id'];
            $chat_id = $input['entry'][0]['messaging'][0]['sender']['id'];
            $FirstName = '';
            $LastName = '';

            $messaging = $input['entry'][0]['messaging'][0];

            \Yii::info("MESSAGIN", 'chat');
            // \Yii::info(print_r($messaging,true), 'chat');


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


            \Yii::info("Genericmessage text   " . $text ? $text : '', 'chat');

            $user = Userbot::find()->where(['id' => $user_id,'platform'=>'facebook'])->all();
            if (!$user) {

                \Yii::info("Add User FACEBOOK  ", 'chat');



            }

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


        }

        if ($this->platform->client == 'telegram') {

            $update = $this->getUpdate();
            $callback_query = $update->getCallbackQuery();


            if (NULL != $callback_query) {

                $callback_query_id = $callback_query->getId();
                $text = $callback_query->getData();
                $message = $callback_query->getMessage();

                $user_id = $callback_query->getFrom()->getId();
                $user_first_name = $callback_query->getFrom()->getFirstName();
                $user_user_name = $callback_query->getFrom()->getUsername();
                $chat_id = $message->getChat()->getId();
                $message_id = $message->getMessageId();
                $FirstName = $callback_query->getFrom()->getFirstName();
                $LastName = $callback_query->getFrom()->getLastName();
            } else {

                $message = $this->getMessage();

                $chat = $message->getChat();
                $user = $message->getFrom();

                $user_first_name = $message->getFrom()->getFirstName();
                $user_user_name = $message->getFrom()->getUsername();
                $text = $message->getText(true);

                $chat_id = $chat->getId();
                $user_id = $user->getId();
                $message_id = $message->getMessageId();
                $FirstName = $user->getFirstName();
                $LastName = $user->getLastName();
            }
        }

        if ($this->platform->client == 'vk') {

            $message = false;
            //Получаем и декодируем уведомление
            $dataVk = json_decode(file_get_contents('php://input'));
            \Yii::info("actionVk \r\n", 'chat');
            $user_id = $dataVk->object->from_id;
            $chat_id = $dataVk->object->peer_id;
            $group_id = $dataVk->group_id;

            $FirstName = '';
            $LastName = '';

            if (isset($dataVk->object->payload))
            {
                $payload = json_decode($dataVk->object->payload,true);
                if (isset($payload)) {
                    $text = isset($payload['button']) ? $payload['button'] : '';
                } else {
                    $text = $dataVk->object->text;
                }
            } else {
                $text = $dataVk->object->text;
            }


            if (isset($dataVk->object->payload)){

            }

            $user_first_name = 'vk';
            $user_user_name ='vk';

        }

        if ($this->platform->client == 'viber') {
            $inputViber = json_decode(file_get_contents('php://input'));
            //  \Yii::info(print_r($input['entry'],true), 'chat');



            $user_id = $inputViber->sender->id;
            $chat_id = $inputViber->sender->id;
            $text = $inputViber->message->text;

            $FirstName = '';
            $LastName = '';


        }

        \Yii::info("TEXT ---   " . $text, 'chat');
        \Yii::info("CHAT_ID ---   " . $chat_id, 'chat');
        \Yii::info("PLATFORM ---   " . $this->platform->client, 'chat');

       // Helper::addUser($this->platform->client,$user_id,$FirstName,$LastName);


        $this->conversation = new Conversation($user_id, $chat_id, $this->getName());

        //cache data from the tracking session if any
        if (!isset($this->conversation->notes['state'])) {
            $state = '0';
        } else {
            $state = $this->conversation->notes['state'];
        }



        \Yii::info("                                        state {$state} ", 'chat');


        $data['chat_id'] = $user_id;

        $botfb = new FbBotApp(env('BOT_TOKEN_FB'));

        switch ($this->platform->client) {

            case 'facebook':



                    switch ($state) {
                        case 0:
                            /**
                             *
                             */
                            if ($text == 'individual') {
                                $this->conversation->notes['state'] = 0;
                                $this->conversation->update();
                            }
                            $this->conversation->notes['name'] = $this->name;
                            $text = '';
                            \Yii::info("                                        case 0 {$state} ", 'chat');

                        case 1:
                            /**
                             * Выбор гороскопа
                             */
                            if (empty($text)) {
                                $this->conversation->notes['state'] = 1;
                                $this->conversation->update();
                                \Yii::info("        Выбор гороскопа", 'chat');

                                $lang = Helper::GetLanguage($chat_id);
                                $botfb->send(new StructuredMessage($chat_id,
                                    StructuredMessage::TYPE_GENERIC,
                                    [
                                        'elements' => [
                                            new MessageElement(\Yii::t('frontend',"Horoscope of compability",[],$lang), \Yii::t('frontend',"You can order a horoscope of compatibility with a man you love a lot there.",[],$lang),
                                                "https://astrobot24.online/storage/web/source/1/eE_UB7sOMSNDTkEH_i8D0P52B5gS-ES0.jpg?_t=1567440928", [
                                                    new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend','Horoscope of compability',[],$lang)),
                                                ]),


                                            new MessageElement(\Yii::t('frontend',"Child horoscope",[],$lang), \Yii::t('frontend',"You can order a horoscope for your child.",[],$lang),
                                                "https://astrobot24.online/storage/web/source/1/_XNGxvTTuLhFrcKDWrrAeI-vgqBOe5Jc.jpg?_t=1570278563", [
                                                    new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend','Child horoscope',[],$lang)),

                                                ]),
                                            new MessageElement(\Yii::t('frontend',"Health horoscope",[],$lang), \Yii::t('frontend',"You can order a horoscope that will tell you about your health there.",[],$lang),
                                                "https://astrobot24.online/storage/web/source/1/_XNGxvTTuLhFrcKDWrrAeI-vgqBOe5Jc.jpg?_t=1570278563", [
                                                    new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend','Health horoscope',[],$lang)),

                                                ]),
                                            new MessageElement(\Yii::t('frontend',"Career horoscope",[],$lang), \Yii::t('frontend',"You will learn about the most favourable days for interviews,  recommendations of stars for negotiations and career advice there.",[],$lang),
                                                "https://astrobot24.online/storage/web/source/1/z83Cd0jmX7lV8OwAKv7QmFKmCJlrbThe.jpg?_t=1567441291", [
                                                    new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend','Career horoscope',[],$lang)),

                                                ]),


                                        ]
                                    ]
                                ));

                                $result = Request::emptyResponse();
                                break;
                            }else {

                                if ($text == 'individual') {
                                    return Request::emptyResponse();
                                }
                                $lang = Helper::GetLanguage($chat_id);

                                if ($lang=='ru-RU') {
                                    if (  $text!='❌ Отмена' && $text != 'Гороскоп совместимости' && $text != 'Детский гороскоп' && $text != 'Гороскоп здоровья' && $text != 'Гороскоп карьеры' ) {

                                        $txt = 'Неверный ввод, выберите гороскоп';

                                        $buttons_Reply = [];


                                      //  $quick_replies[] =  ['content_type'=>'text', 'title'=>'⬅ Назад', 'payload'=>'⬅ Назад'];
                                        $quick_replies[] =  ['content_type'=>'text', 'title'=>'❌ Отмена', 'payload'=>'❌ Отмена'];

                                        $botfb->send(new QuickReply($chat_id,\Yii::t('frontend',$txt,[],Helper::GetLanguage($user_id) ),$quick_replies));

                                        $result = Request::emptyResponse();

                                        break;
                                    }
                                    $arr = [
                                        'Гороскоп совместимости'=>'Horoscope of compability',
                                        'Детский гороскоп'=>'Child horoscope',
                                        'Гороскоп здоровья'=>'Health horoscope',
                                        'Гороскоп карьеры'=>'Career horoscope'
                                    ];
                                    $this->conversation->notes['goroskop'] = $arr[$text];
                                    $this->conversation->update();

                                } else {
                                    if (  $text!='❌ Отмена' && $text != 'Horoscope of compability' && $text != 'Child horoscope' && $text != 'Health horoscope' && $text != 'Career horoscope'  ) {

                                        $txt = 'Incorrect entry, select the horoscope';
                                        $buttons_Reply = [];


                                       // $quick_replies[] =  ['content_type'=>'text', 'title'=>'⬅ Назад', 'payload'=>'⬅ Назад'];
                                        $quick_replies[] =  ['content_type'=>'text', 'title'=>'❌ Отмена', 'payload'=>'❌ Отмена'];

                                        $botfb->send(new QuickReply($chat_id,\Yii::t('frontend',$txt,[],Helper::GetLanguage($user_id) ),$quick_replies));


                                        $result = Request::emptyResponse();

                                        break;
                                    }


                                    if ($text == '❌ Отмена') {
                                        $this->conversation->stop();
                                        $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                        break;
                                    }

                                    $this->conversation->notes['goroskop'] = $text;
                                    $this->conversation->update();
                                }

                            }


                            $text = '';
                            \Yii::info("                                        state1 {$state} ", 'chat');
                        // no break
                        case 2:
                            /**
                             * Выбор гороскопа
                             */
                            if (empty($text)) {

                                $this->conversation->notes['state'] = 2;
                                $this->conversation->update();
                                \Yii::info("        Заказ гороскопа", 'chat');
                                switch ($this->conversation->notes['goroskop']) {
                                    case 'Horoscope of compability':
                                        $result = Helper::getScreenFb( $chat_id, 'goroskop-sovmestimosti-partnerov-fb' ,Helper::GetLanguage($chat_id));
                                        $result = Request::emptyResponse();
                                        break;
                                    case 'Child horoscope':
                                        $result = Helper::getScreenFb( $chat_id, 'detskij-goroskop-fb' ,Helper::GetLanguage($chat_id));
                                        $result = Request::emptyResponse();
                                        break;
                                    case 'Health horoscope':
                                        $result = Helper::getScreenFb( $chat_id, 'goroskop-zdorova-fb' ,Helper::GetLanguage($chat_id));
                                        $result = Request::emptyResponse();
                                        break;
                                    case 'Career horoscope':
                                        $result = Helper::getScreenFb( $chat_id, 'goroskop-karery-fb' ,Helper::GetLanguage($chat_id));
                                        $result = Request::emptyResponse();
                                        break;
                                }



                            } else {

                                if ($text!='⬅ Назад' && $text!='❌ Отмена' && $text != 'orderpartner' && $text != 'orderdetiy' && $text != 'orderzdorova' && $text != 'orderkarery') {

                                    $txt = 'Incorrect entry, select the order or go previous step';

                                    $buttons_Reply = [];


                                    $quick_replies[] =  ['content_type'=>'text', 'title'=>'⬅ Назад', 'payload'=>'⬅ Назад'];
                                    $quick_replies[] =  ['content_type'=>'text', 'title'=>'❌ Отмена', 'payload'=>'❌ Отмена'];

                                        $botfb->send(new QuickReply($chat_id,\Yii::t('frontend',\Yii::t('frontend',$txt,[],Helper::GetLanguage($user_id) ),
                                            [],Helper::GetLanguage($chat_id) ),$quick_replies));


                                    $result = Request::emptyResponse();
                                    break;
                                }

                                if ($text=='⬅ Назад') {
                                        $this->conversation->notes['state'] = 1;
                                        $this->conversation->update();
                                        $lang = Helper::GetLanguage($chat_id);
                                        $botfb->send(new StructuredMessage($chat_id,
                                            StructuredMessage::TYPE_GENERIC,
                                            [
                                                'elements' => [
                                                    new MessageElement(\Yii::t('frontend',"Horoscope of compability",[],$lang), \Yii::t('frontend',"You can order a horoscope of compatibility with a man you love a lot there.",[],$lang),
                                                        "https://astrobot24.online/storage/web/source/1/eE_UB7sOMSNDTkEH_i8D0P52B5gS-ES0.jpg?_t=1567440928", [
                                                            new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend','Horoscope of compability',[],$lang)),
                                                        ]),


                                                    new MessageElement(\Yii::t('frontend',"Child horoscope",[],$lang), \Yii::t('frontend',"You can order a horoscope for your child.",[],$lang),
                                                        "https://astrobot24.online/storage/web/source/1/_XNGxvTTuLhFrcKDWrrAeI-vgqBOe5Jc.jpg?_t=1570278563", [
                                                            new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend','Child horoscope',[],$lang)),

                                                        ]),
                                                    new MessageElement(\Yii::t('frontend',"Health horoscope",[],$lang), \Yii::t('frontend',"You can order a horoscope that will tell you about your health there.",[],$lang),
                                                        "https://astrobot24.online/storage/web/source/1/_XNGxvTTuLhFrcKDWrrAeI-vgqBOe5Jc.jpg?_t=1570278563", [
                                                            new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend','Health horoscope',[],$lang)),

                                                        ]),
                                                    new MessageElement(\Yii::t('frontend',"Career horoscope",[],$lang), \Yii::t('frontend',"You will learn about the most favourable days for interviews,  recommendations of stars for negotiations and career advice there.",[],$lang),
                                                        "https://astrobot24.online/storage/web/source/1/z83Cd0jmX7lV8OwAKv7QmFKmCJlrbThe.jpg?_t=1567441291", [
                                                            new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend','Career horoscope',[],$lang)),

                                                        ]),


                                                ]
                                            ]
                                        ));

                                        $result = Request::emptyResponse();
                                        break;
                                    }

                                if ($text == '❌ Отмена') {
                                    $this->conversation->stop();
                                    $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                    break;
                                }

                                $this->conversation->stop();
                                return   $this->platform->executeCommand($text, $this->update);




                            }

                        // no break
                    }









                break;




        }



        return $result;
    }

    public static function getScreen($user_id,$chat_id, $key, $keyboardHide = false)
    {



        $result = NULL;
        $screen_id = Helper::getScreenFromKey($key);
        $messages =  WidgetText::find()->where(['screens_id' => $screen_id, 'status' => 1])->orderBy(['sort' => 'DESC'])->all();
        foreach ($messages as $mes) {


            $txt_out = Helper::GetText($mes->key);
            \Yii::info("getScreen message_id {$mes->id}   text -  {$txt_out}", 'chat');
            $data = Helper::getKeyBoard($mes->id, $chat_id, $keyboardHide);



            $count = $mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->count();
            $data['chat_id'] = $chat_id;
            $data['parse_mode']='HTML';
            if ($count) {
                foreach ($mes->getBenMessageImages()->orderBy(['order' => SORT_ASC])->all() as $image) {
                    if ($image->type == 'image/jpeg' || $image->type == 'image/gif' || $image->type == 'image/png') {
                        $data['photo'] = $image->getUrl();
                        $data['caption'] = $txt_out;
                        // \Yii::info("getScreen    sendPhoto " . print_r($data['photo'], true), 'chat');
                        $result = Request::sendPhoto($data);
                    }
                    if ($image->type == 'video/mp4') {
                        $data['video'] = $image->getUrl();
                        $data['caption'] = $txt_out;
                        // \Yii::info("getScreen    sendVideo " . print_r($data['video'], true), 'chat');
                        $result = Request::sendVideo($data);
                    }
                }
            } else {



                if ($txt_out) {


                    $data['text'] = $txt_out;

                    \Yii::info("getScreen    sendMessage " . print_r($data['text'], true), 'chat');


                    $result = Request::sendMessage($data);
                }
            }
        }


        return $result;
    }

    public static function getScreenVk($chat_id,$key){


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

            // \Yii::info("    buttons_Reply  ".print_r($buttons_Reply,true), 'chat');
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
                //  \Yii::info("sendMessage buttons_Reply " . print_r($btn_out_Reply, true), 'chat');
                $keyboard = $btn_out_Reply;
            }

            $btn = [
                'one_time' => true,
                'buttons' => $keyboard,
            ];



            $btnVk = array_merge($btnVk,$btn);

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
}

