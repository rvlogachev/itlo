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

use  common\modules\bot\commands\SystemCommand;
use common\modules\bot\components\facebook\FbBotApp;
use common\modules\bot\components\facebook\Messages\MessageButton;
use common\modules\bot\components\facebook\Messages\QuickReply;
use common\modules\bot\components\facebook\Messages\StructuredMessage;
use common\modules\bot\components\Helper;
use  common\modules\bot\components\telegram\Entities\InlineKeyboardButton;
use  common\modules\bot\components\telegram\Entities\InlineKeyboardMarkup;
use  common\modules\bot\components\telegram\Entities\ReplyKeyboardMarkup;
use common\modules\bot\components\viber\Api\Message;
use common\modules\bot\models\BotButtons;
use common\modules\bot\models\UserBot;
use common\modules\bot\models\WidgetText;
use  common\modules\bot\Request;

use  common\modules\bot\Conversation;

/**
 * New chat title command
 */




class OrderdetiyCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'orderdetiy';
    protected $description = 'orderdetiy';
    protected $version = '1.0.1';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {


        \Yii::info("orderdetiy  ", 'chat');

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

            $user = UserBot::find()->where(['id' => $user_id,'platform'=>'facebook'])->all();
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


        \Yii::info("orderdetiy  text --- ".$text, 'chat');
        //Preparing Respose
        $data = [];
        $data['chat_id'] = $chat_id;
        //Conversation start
        $this->conversation = new Conversation($user_id, $chat_id, $this->getName());

        //cache data from the tracking session if any
        if (!isset($this->conversation->notes['state'])) {
            $state = '0';
        } else {
            $state = $this->conversation->notes['state'];
        }

        \Yii::info("     state {$state} ", 'chat');
        
        switch ($this->platform->client) {


            case 'telegram':
                
                switch ($state) {
                    case 0:
                        /**
                         *
                         */
                        if ($text == 'orderdetiy') {
                            $this->conversation->notes['state'] = 0;
                            $this->conversation->update();
                        }
                        $this->conversation->notes['name'] = $this->name;
                        $this->conversation->update();
                        $this->conversation->notes['user_id'] = $user_id;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        case 0 {$state} ", 'chat');

                    case 1:
                        /**
                         * Ввод имени
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 1;
                            $this->conversation->update();
                            \Yii::info("        Ввод имени ", 'chat');
                            $result = self::getScreen($user_id,$chat_id, 'partner-detskij1', true);
                            break;
                        } else {

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id, $chat_id, 'startovyj-ekran-vk', true);
                                break;
                            }
                            if ($text == '⬅ Назад') {

                                $this->conversation->stop();
                                $data['text'] = 'Ваша заявка отменена.';
                                $result = Request::sendMessage($data);

                                $result = self::getScreen($user_id,$chat_id, 'vybor-uslugi', true);
                                break;
                            }
                        }


                        $this->conversation->notes['yourname'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state1 {$state} ", 'chat');
                    // no break

                    case 2:
                        /**
                         * Ввод даты рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 2;
                            $this->conversation->update();
                            $result = self::getScreen($user_id,$chat_id, 'partner-detskij2', true);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'partner-detskij1', true);
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id, $chat_id, 'startovyj-ekran-vk', true);
                                break;
                            }
                        }



                        $this->conversation->notes['date_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state2 {$state} ", 'chat');
                    // no break

                    case 3:
                        /**
                         * ввод времени рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 3;
                            $this->conversation->update();
                            \Yii::info("        Выбор модели ", 'chat');
                            $result = self::getScreen($user_id,$chat_id, 'partner-detskij3', true);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'partner-detskij2', true);
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id, $chat_id, 'startovyj-ekran-vk', true);
                                break;
                            }
                        }


                        $this->conversation->notes['time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 4:
                        /**
                         * ввод времени рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 4;
                            $this->conversation->update();
                            \Yii::info("        Ввод места ", 'chat');
                            $result = self::getScreen($user_id,$chat_id, 'partner-detskij4', true);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'partner-detskij3', true);
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id, $chat_id, 'startovyj-ekran-vk', true);
                                break;
                            }
                        }

                        $this->conversation->notes['place_birth'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state4 {$state} ", 'chat');
                    // no break
                    case 5:
                        /**
                         *Ввод эл почта
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 5;
                            $this->conversation->update();
                            \Yii::info("        Ввод эл почта ", 'chat');

                            $result = self::getScreen($user_id,$chat_id, 'partner-detskij5', true);
                            break;
                        } else {
                            if ( $text != '❌ Отмена' && $text != '⬅ Назад' && !preg_match('/^[-\w.]+@([а-яёА-ЯЁA-z0-9][-а-яёА-ЯЁA-z0-9]+\.)+[а-яёА-ЯЁA-z]{2,6}$/u', $text)) {

                                $data['text'] = 'Неправильный ввод электронного адреса. Повторите ввод.';
                                $result = Request::sendMessage($data);
                                break;
                            }

                            if ($text == '⬅ Назад') {

                                $this->conversation->notes['state'] = $state - 1;

                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'partner-detskij4', true);
                                break;
                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id, $chat_id, 'startovyj-ekran-vk', true);
                                break;
                            }
                        }



                        $this->conversation->notes['vvod_email'] = $text;
                        $text = '';
                        \Yii::info("                                        state9 {$state} ", 'chat');
                    // no break

                    case 6:
                        /**
                         * Оплата
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 6;

                            $this->conversation->update();
                            $order = Helper::addOrder('orderdetiy',$this->conversation->notes);
                            Helper::addOrderAmo('orderdetiy',$order,$user_id);
                            \Yii::info("        Оплата ", 'chat');
                            $data['text'] = \common\modules\widget\widgets\DbText::widget(['key' => 'txt_for_pay_telegram']);
                            \Yii::info("getScreen    sendMessage " . print_r($data['text'], true), 'chat');
                            $inlineButtons[] = [
                                new InlineKeyboardButton(
                                    [
                                        'text' => "Оплатить",
                                        'url' => "https://astrobot24.online/chat/default/pay/?chatid=".$chat_id."&tarif=detiy&invoice=".$order->id."&email=".$this->conversation->notes['vvod_email']."&platform=telegram&lang=ru-RU&curs=70",
                                    ]
                                )
                            ];
                            $data['reply_markup'] =  new InlineKeyboardMarkup(
                                [
                                    'inline_keyboard' =>$inlineButtons
                                ]
                            );

                            $result = Request::sendMessage($data);
                            break;
                        }else {


                            $this->conversation->stop();
                            $result = self::getScreen($user_id, $chat_id, 'startovyj-ekran-vk', true);

                        }
                        \Yii::info("                                        state10 {$state} ", 'chat');

                }
                $result = Request::emptyResponse();
                break;
            
            case 'vk':


                switch ($state) {
                    case 0:
                        /**
                         *
                         */
                        if ($text == 'orderdetiy') {
                            $this->conversation->notes['state'] = 0;
                            $this->conversation->update();
                        }
                        $this->conversation->notes['name'] = $this->name;
                        $this->conversation->update();
                        $this->conversation->notes['user_id'] = $user_id;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        case 0 {$state} ", 'chat');

                    case 1:
                        /**
                         * Ввод имени
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 1;
                            $this->conversation->update();
                            \Yii::info("        Ввод имени ", 'chat');
                            $result = self::getScreenVk($user_id, 'partner-detskij1-vk');
                            $result = Request::emptyResponse();
                            break;
                        } else {
                            \Yii::info("        Ввод имени ".$text, 'chat');
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id,  'startovyj-ekran-vk' );
                                \Yii::info("        result ".$result, 'chat');
                                break;
                            }
                            if ($text == '⬅ Назад') {

                                $this->conversation->stop();
                                
                                $txt = 'Ваша заявка отменена.';
                                $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                                $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk(['menu'=>'Меню'],'text'));

                                $result = self::getScreenVk($user_id,  'vybor-uslugi-vk' );
                                break;
                            }
                        }


                        $this->conversation->notes['yourname'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state1 {$state} ", 'chat');
                    // no break

                    case 2:
                        /**
                         * Ввод даты рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 2;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'partner-detskij2-vk' );
                            $result = Request::emptyResponse();
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id,  'partner-detskij1-vk' );
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id,   'startovyj-ekran-vk' );
                                break;
                            }
                        }



                        $this->conversation->notes['date_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state2 {$state} ", 'chat');
                    // no break

                    case 3:
                        /**
                         * ввод времени рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 3;
                            $this->conversation->update();
                            \Yii::info("        Выбор модели ", 'chat');
                            $result = self::getScreenVk($user_id,  'partner-detskij3-vk' );
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id,  'partner-detskij2-vk' );
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id,   'startovyj-ekran-vk' );
                                break;
                            }
                        }


                        $this->conversation->notes['time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 4:
                        /**
                         * ввод времени рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 4;
                            $this->conversation->update();
                            \Yii::info("        Ввод места ", 'chat');
                            $result = self::getScreenVk($user_id,  'partner-detskij4-vk' );
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id,  'partner-detskij3-vk' );
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id,   'startovyj-ekran-vk' );
                                break;
                            }
                        }

                        $this->conversation->notes['place_birth'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state4 {$state} ", 'chat');
                    // no break
                    case 5:
                        /**
                         *Ввод эл почта
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 5;
                            $this->conversation->update();
                            \Yii::info("        Ввод эл почта ", 'chat');

                            $result = self::getScreenVk($user_id,  'partner-detskij5-vk' );
                            break;
                        } else {
                            if ( $text != '❌ Отмена' && $text != '⬅ Назад' && !preg_match('/^[-\w.]+@([а-яёА-ЯЁA-z0-9][-а-яёА-ЯЁA-z0-9]+\.)+[а-яёА-ЯЁA-z]{2,6}$/u', $text)) {

                                $txt = 'Неправильный ввод электронного адреса. Повторите ввод.';
                                $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                                $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk(['menu'=>'Меню'],'text'));
                                $result = Request::emptyResponse();
                                break;
                            }

                            if ($text == '⬅ Назад') {

                                $this->conversation->notes['state'] = $state - 1;

                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'partner-detskij4-vk', true);
                                break;
                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id, $chat_id, 'startovyj-ekran-vk', true);
                                break;
                            }
                        }



                        $this->conversation->notes['vvod_email'] = $text;
                        $text = '';
                        \Yii::info("                                        state5 {$state} ", 'chat');
                    // no break

                    case 6:
                        /**
                         * Оплата
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 6;

                            $this->conversation->update();
                            $order = Helper::addOrder('orderdetiy',$this->conversation->notes,'vk');
                            Helper::addOrderAmo('orderdetiy',$order,$user_id,'vk');

                            \Yii::info("        Оплата ", 'chat');


                            $txt = \common\modules\widget\widgets\DbText::widget(['key' => 'txt_for_pay']);

                            $txt .= "\r\n\r\n";
                            $txt .= "Для оплаты пройдите по ссылке:\r\n";
                            $txt .= "https://astrobot24.online/chat/default/pay/?chatid=".$chat_id."&tarif=detiy&invoice=".$order->id."&email=".$this->conversation->notes['vvod_email']."&platform=vk&lang=ru-RU&curs=70";
                            $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                            //$result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk(["https://astrobot24.online/chat/default/pay/?chatid=".$chat_id."&tarif=partner&invoice=".$order->id."&email=".$this->conversation->notes['vvod_email'] =>'Оплатить'],'open_url'));
                            $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk([ ],'text'));
                            \Yii::info("  dd      result ".print_r($result,true), 'chat');
                            $this->conversation->notes['endmess'] = $result;
                            $this->conversation->update();
                            $result = Request::emptyResponse();
                            break;
                        }
                        else {
                            \Yii::info("  dataVk->object->id ".print_r($dataVk->object->id,true), 'chat');
                            \Yii::info("  this->conversation->notes['endmess'] ".print_r($this->conversation->notes['endmess'],true), 'chat');
                            if ($dataVk->object->id <> $this->conversation->notes['endmess']-1) {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id,   'startovyj-ekran-vk' );
                            } else {
                                $result = Request::emptyResponse();
                            }
                            break;
                        }
                        \Yii::info("                                        state6 {$state} ", 'chat');

                }
                $result = Request::emptyResponse();
                break;

            case 'facebook':

                $lang = Helper::GetLanguage($user_id);
                $botfb = new FbBotApp(env('BOT_TOKEN_FB'));

                switch ($state) {
                    case 0:
                        /**
                         *
                         */
                        if ($text == 'orderdetiy') {
                            $this->conversation->notes['state'] = 0;
                            $this->conversation->update();
                        }
                        $this->conversation->notes['name'] = $this->name;
                        $this->conversation->notes['user_id'] = $user_id;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        case 0 {$state} ", 'chat');

                    case 1:
                        /**
                         * Ввод имени
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 1;
                            $this->conversation->update();
                            \Yii::info("        Ввод имени ", 'chat');
                            $result = Helper::getScreenFb( $user_id, 'partner-detskij1' ,$lang);
                            break;
                        }else {

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }


                        $this->conversation->notes['yourname'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state1 {$state} ", 'chat');
                    // no break

                    case 2:
                        /**
                         * Ввод даты рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 2;
                            $this->conversation->update();
                            $result = Helper::getScreenFb( $user_id, 'partner-detskij2' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'partner-detskij1' ,$lang);
                                break;

                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }


                        $this->conversation->notes['date_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state2 {$state} ", 'chat');
                    // no break

                    case 3:
                        /**
                         * ввод времени рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 3;
                            $this->conversation->update();
                            \Yii::info("        Ввод даты рождения ", 'chat');
                            $result = Helper::getScreenFb( $user_id, 'partner-detskij3' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'partner-detskij2' ,$lang);
                                break;

                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }


                        $this->conversation->notes['time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 4:
                        /**
                         * ввод времени рождения
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 4;
                            $this->conversation->update();
                            \Yii::info("        Ввод места ", 'chat');
                            $result = Helper::getScreenFb( $user_id, 'partner-detskij4' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'partner-detskij3' ,$lang);
                                break;

                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }

                        $this->conversation->notes['place_birth'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state4 {$state} ", 'chat');
                    // no break
                    case 5:
                        /**
                         *Ввод эл почта
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 5;
                            $this->conversation->update();
                            \Yii::info("        Ввод эл почта ", 'chat');

                            $txty = Helper::getMessageScreen('partner-detskij5' ,'facebook');
                            $quick_replies[] =  ['content_type'=>'user_email' ];
                            $botfb->send(new QuickReply($chat_id,\Yii::t('frontend',$txty,[],$lang),$quick_replies));
                            $result = Request::emptyResponse();
                            break;
                        } else {
                            if ( $text != '❌ Отмена' && $text != '⬅ Назад' && !preg_match('/^[-\w.]+@([а-яёА-ЯЁA-z0-9][-а-яёА-ЯЁA-z0-9]+\.)+[а-яёА-ЯЁA-z]{2,6}$/u', $text)) {

                                $txt = 'Incorrect entry email address. Repeat please.';
                                $botfb->send(new \common\modules\bot\components\facebook\Messages\Message($user_id,\Yii::t('frontend',$txt,[],Helper::GetLanguage($user_id) )));
                                $result = Request::emptyResponse();
                                break;

                            }
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'partner-detskij4' ,$lang);
                                break;

                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }

                        }



                        $this->conversation->notes['vvod_email'] = $text;
                        $text = '';
                        \Yii::info("                                        state5 {$state} ", 'chat');
                    // no break

                    case 6:
                        /**
                         * Оплата
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 6;

                            $this->conversation->update();
                            $order = Helper::addOrder('orderdetiy',$this->conversation->notes,'facebook');
                            Helper::addOrderAmo('orderdetiy',$order,$user_id,'facebook');

                            \Yii::info("        Оплата ", 'chat');



                            $txt = "Good. After payment, the horoscope will arrive at your email within 3 days. Now you can pay for the service using the button below:";
                            $curs = \Yii::$app->keyStorage->get('current_curs');
                            $urlbtn =  "https://astrobot24.online/chat/default/pay/?chatid=".$chat_id."&tarif=detiy&email=".$this->conversation->notes['vvod_email']."&invoice=".$order->id."&platform=facebook&lang=".$lang."&curs=".$curs;
                            $result =  $botfb->send(new StructuredMessage($chat_id,
                                StructuredMessage::TYPE_BUTTON,
                                [
                                    'text' => \Yii::t('frontend',$txt ,[],$lang),
                                    'buttons' => [
                                        new MessageButton(MessageButton::TYPE_WEB, \Yii::t('frontend','Pay',[],$lang),$urlbtn),
                                    ]
                                ]  ));
                            $this->conversation->notes['endmess'] = $result;
                            $this->conversation->update();
                            $result = Request::emptyResponse();
                            break;
                        }
                        else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'partner-detskij5' ,$lang);
                                break;

                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }


                            $this->conversation->stop();

                            $result = Helper::getScreenFb( $chat_id, 'startovyj-ekranfb' ,Helper::GetLanguage($chat_id));
                            break;



                        }

                }
                $result = Request::emptyResponse();
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
        $screen_id = Helper::getScreenFromKey($key,'vk');
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