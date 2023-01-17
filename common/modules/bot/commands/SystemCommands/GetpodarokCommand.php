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
use common\modules\bot\components\facebook\Messages\MessageElement;
use common\modules\bot\components\facebook\Messages\QuickReply;
use common\modules\bot\components\facebook\Messages\StructuredMessage;
use common\modules\bot\components\Helper;
use  common\modules\bot\components\telegram\Entities\InlineKeyboardButton;
use  common\modules\bot\components\telegram\Entities\InlineKeyboardMarkup;
use  common\modules\bot\components\telegram\Entities\ReplyKeyboardMarkup;
use common\modules\bot\components\viber\Api\Message;
use common\modules\bot\models\BotButtons;
use common\modules\bot\models\BotOrder;
use common\modules\bot\models\UserBot;
use common\modules\bot\models\WidgetText;
use  common\modules\bot\Request;

use  common\modules\bot\Conversation;

/**
 * New chat title command
 */




class GetpodarokCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'getpodarok';
    protected $description = 'getpodarok';
    protected $version = '1.0.1';
    /**#@-*/

    /**
     * {@inheritdoc}
     */
    public function execute()
    {


        \Yii::info("podarok  ", 'chat');

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


        \Yii::info("podarok  text --- ".$text, 'chat');
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

                $lang = 'ru-RU';

                switch ($state) {
                    case 0:
                        /**
                         *
                         */
                        if ($text == 'getpodarok') {
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
                         * Ввод промо кода
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 1;
                            $this->conversation->update();
                            $result = self::getScreen($user_id,$chat_id, 'get-podarok-tlg', true);

                            break;
                        }else {

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);


                                break;
                            }

                            if (!Helper::CheckPromo($text,$user_id)) {
                                $data['text'] = 'Вы ввели неверный код или код более не используется. Повторите ввод.';
                                $result = Request::sendMessage($data);
                                $result = self::getScreen($user_id,$chat_id, 'get-podarok-tlg', true);
                                break;

                            }
                        }
                        $this->conversation->notes['promo'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state1 {$state} ", 'chat');
                    // no break

                    case 2:
                        /**
                         * Выбор гороскопа
                         */
                        if (empty($text)) {
                            $order = BotOrder::find()->where(['promo'=>$this->conversation->notes['promo']])->one();
                            $this->conversation->notes['horoscope'] = $order->vidhoroscope;
                            $this->conversation->notes['state'] = 2;
                            $this->conversation->update();

                            $data['text'] = \Yii::t('frontend','Отлично. Вам предоставлен - ',[],$lang ).Helper::GetHoroscopeVk($order->vidhoroscope ,$lang);
                            $result = Request::sendMessage($data);
                            $result = self::getScreen($user_id,$chat_id, 'vvod-fio-tlg', true);
                            break;

                        }else {

                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'get-podarok-tlg', true);

                                break;

                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);

                                break;
                            }

                        }


                        $this->conversation->notes['yourname'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state2 {$state} ", 'chat');
                    // no break
                    case 3:
                        /**
                         * ввод даты */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 3;
                            $this->conversation->update();
                            $result = self::getScreen($user_id,$chat_id, 'vvod-date-tlg', true);


                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $order = BotOrder::find()->where(['promo'=>$this->conversation->notes['promo']])->one();
                                $this->conversation->notes['horoscope'] = $order->vidhoroscope;
                                $this->conversation->notes['state'] = 2;
                                $this->conversation->update();

                                $data['text'] = \Yii::t('frontend','Отлично. Вам предоставлен - ',[],$lang ).Helper::GetHoroscopeVk($order->vidhoroscope ,$lang);
                                $result = Request::sendMessage($data);
                                $result = self::getScreen($user_id,$chat_id, 'vvod-fio-tlg', true);
                                break;

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);

                                break;
                            }

                        }


                        $this->conversation->notes['date_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 4:
                        /**
                         * ввод времени
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 4;
                            $this->conversation->update();
                            $result = self::getScreen($user_id,$chat_id, 'vvod-vremeni-rozdenia-tlg', true);


                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = 3;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'vvod-date-tlg', true);

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);

                                break;
                            }

                        }


                        $this->conversation->notes['time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 5:
                        /**
                         * указать анонимный подарок или нет
                         */
                        $order = BotOrder::find()->where(['status'=>0,'promo'=>$this->conversation->notes['promo']])->one();
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 5;
                            $this->conversation->update();

                            $typegor = Helper::GetHoroscope($order->vidhoroscope ,$lang);
                            switch ($typegor) {
                                case ('Гороскоп совместимости' ):
                                    $result = self::getScreen($user_id,$chat_id, 'vvod-mesta-rozdenia-tlg', true);
                                    break;
                                case ('Детский гороскоп' ):
                                    $result = self::getScreen($user_id,$chat_id, 'vvod-mesta-rozdenia-tlg-deti', true);
                                    break;
                                case ('Гороскоп здоровья'):
                                    $result = self::getScreen($user_id,$chat_id, 'vvod-mesta-rozdenia-tlg-zdorov', true);
                                    break;
                                case ('Гороскоп карьеры' ):
                                    $result = self::getScreen($user_id,$chat_id, 'vvod-mesta-rozdenia-tlg-karery', true);
                                    break;
                            }


                            break;
                        } else {

                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'vvod-vremeni-rozdenia-tlg', true);
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);
                                break;
                            }
                        }

                        $this->conversation->notes['place_birth'] = $text;
                        $this->conversation->update();

                        if ($order->vidhoroscope!='goroskop-sovmestimosti-partnerov') {
                            $this->conversation->notes['state'] = 10;
                            $this->conversation->update();
                            $data['text'] = 'Спасибо за информацию.';
                            $result = Request::sendMessage($data);
                            $result = self::getScreen($user_id,$chat_id, 'vvod-pocty-tlg', true);
                            break;
                        } else {
                            $text = '';
                        }

                        \Yii::info("                                        state5 {$state} ", 'chat');
                    // no break
                    case 6:
                        /**
                         * ввод времени
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 6;
                            $this->conversation->update();
                            $result = self::getScreen($user_id,$chat_id, 'vvod-name-partner-tlg', true);


                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = 5;
                                $this->conversation->update();

                                $typegor = Helper::GetHoroscope($order->vidhoroscope ,$lang);
                                switch ($typegor) {
                                    case ('Гороскоп совместимости' ):
                                        $result = self::getScreen($user_id,$chat_id, 'vvod-mesta-rozdenia-tlg', true);
                                        break;
                                    case ('Детский гороскоп' ):
                                        $result = self::getScreen($user_id,$chat_id, 'vvod-mesta-rozdenia-tlg-deti', true);
                                        break;
                                    case ('Гороскоп здоровья'):
                                        $result = self::getScreen($user_id,$chat_id, 'vvod-mesta-rozdenia-tlg-zdorov', true);
                                        break;
                                    case ('Гороскоп карьеры' ):
                                        $result = self::getScreen($user_id,$chat_id, 'vvod-mesta-rozdenia-tlg-karery', true);
                                        break;
                                }
                                break;

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);

                                break;
                            }

                        }


                        $this->conversation->notes['partner_name'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break
                    case 7:
                        /**
                         * ввод времени
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 7;
                            $this->conversation->update();
                            $result = self::getScreen($user_id,$chat_id, 'vvod-date-partner-tlg', true);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = 6;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'vvod-name-partner-tlg', true);

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);

                                break;
                            }

                        }


                        $this->conversation->notes['partner_date_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break
                    case 8:
                        /**
                         * ввод времени
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 8;
                            $this->conversation->update();
                            $result = self::getScreen($user_id,$chat_id, 'vvod-time-partner-tlg', true);


                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = 7;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'vvod-date-partner-tlg', true);

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);

                                break;
                            }

                        }


                        $this->conversation->notes['partner_time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break
                    case 9:
                        /**
                         * ввод времени
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 9;
                            $this->conversation->update();
                            $result = self::getScreen($user_id,$chat_id, 'vvod-place-partner-tlg', true);


                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = 8;
                                $this->conversation->update();
                                $result = self::getScreen($user_id,$chat_id, 'vvod-time-partner-tlg', true);


                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreen($user_id,$chat_id, 'startovyj-ekran', true);

                                break;
                            }

                        }


                        $this->conversation->notes['time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break
                    case 10:
                        /**
                         *Ввод эл почта
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 10;
                            $this->conversation->update();
                            $data['text'] = 'Спасибо за информацию.';
                            $result = Request::sendMessage($data);
                            $result = self::getScreen($user_id,$chat_id, 'vvod-pocty-tlg', true);
                            break;
                        } else {
                            if ( !preg_match('/^[-\w.]+@([а-яёА-ЯЁA-z0-9][-а-яёА-ЯЁA-z0-9]+\.)+[а-яёА-ЯЁA-z]{2,6}$/u', $text)) {

                                $data['text'] = 'Неверный ввод email адреса. Повторите ввод.';
                                $result = Request::sendMessage($data);
                                $result = self::getScreen($user_id,$chat_id, 'vvod-pocty-tlg', true);
                                break;

                            }



                        }



                        $this->conversation->notes['vvod_email'] = $text;
                        $text = '';
                        \Yii::info("                                        state5 {$state} ", 'chat');
                    // no break

                    case 11:
                        /**
                         * Оплата
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 11;

                            $this->conversation->update();


                            $order = Helper::addActivOrder('activatepodarok',$this->conversation->notes,'telegram');

                            switch ($this->conversation->notes['horoscope'] ) {
                                case 'goroskop-zdorova':
                                    Helper::addActivPodarokOrderAmo('orderzdorova',$order,$user_id,'telegram');
                                    $tarif = 'zdorova';
                                    break;
                                case 'goroskop-karery':
                                    Helper::addActivPodarokOrderAmo('ordeerkarery',$order,$user_id,'telegram');
                                    $tarif = 'karery';
                                    break;
                                case 'detskij-goroskop':
                                    Helper::addActivPodarokOrderAmo('orderdetiy',$order,$user_id,'telegram');
                                    $tarif = 'detiy';
                                    break;
                                case 'goroskop-sovmestimosti-partnerov':
                                    Helper::addActivPodarokOrderAmo('orderpartner',$order,$user_id,'telegram');
                                    $tarif = 'partner';
                                    break;


                            }


                            Helper::RestorePromo($this->conversation->notes['promo'] );

                            $this->conversation->stop();

                            $txty = self::getScreen($user_id,$chat_id, 'podarok-polucen-tlg', true);

                            break;
                        }

                }
                $result = Request::emptyResponse();
                break;


            case 'vk':

                $lang = 'ru-RU';

                switch ($state) {
                    case 0:
                        /**
                         *
                         */
                        if ($text == 'getpodarok') {
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
                         * Ввод промо кода
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 1;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'polucit-podarok-vk');

                            break;
                        }else {

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');

                                break;
                            }

                            if (!Helper::CheckPromo($text,$user_id)) {
                                $txt = 'Вы ввели неверный код или код более не используется. Повторите ввод.';
                                $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                                $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk(['❌ Отмена'=>'❌ Отмена' ],'text'));
                                $result = Request::emptyResponse();
                                break;
                            }
                        }
                        $this->conversation->notes['promo'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state1 {$state} ", 'chat');
                    // no break

                    case 2:
                        /**
                         * Выбор гороскопа
                         */
                        if (empty($text)) {
                            $order = BotOrder::find()->where(['promo'=>$this->conversation->notes['promo']])->one();
                            $this->conversation->notes['horoscope'] = $order->vidhoroscope;
                            $this->conversation->notes['state'] = 2;
                            $this->conversation->update();
                            $txt = \Yii::t('frontend','Отлично. Вам предоставлен - ',[],$lang ).Helper::GetHoroscopeVk($order->vidhoroscope ,$lang);
                            $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                            $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk([ ],'text'));
                            $result = Request::emptyResponse();
                            $result = self::getScreenVk($user_id, 'vvod-fio-vk');

                            break;
                        }else {

                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id, 'polucit-podarok-vk');

                                break;

                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');

                                break;
                            }

                        }


                        $this->conversation->notes['yourname'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state2 {$state} ", 'chat');
                    // no break
                    case 3:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 3;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'vvod-dati-rozdenia-vk');

                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id, 'vvod-fio-vk');
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');

                                break;
                            }
                        }


                        $this->conversation->notes['date_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 4:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 4;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'vvod-vremeni-rozdenia-vk');

                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id, 'vvod-fio-vk');
                                break;

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');
                                break;
                            }

                        }


                        $this->conversation->notes['time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state4 {$state} ", 'chat');
                    // no break

                    case 5:
                        /**
                         * указать анонимный подарок или нет
                         */
                        $order = BotOrder::find()->where(['status'=>0,'promo'=>$this->conversation->notes['promo']])->one();
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 5;
                            $this->conversation->update();
                            $typegor = Helper::GetHoroscope($order->vidhoroscope ,$lang);
                            switch ($typegor) {
                                case ('Гороскоп совместимости' ):
                                    $result = self::getScreenVk($user_id, 'vvod-mesta-rozdenia-vk');
                                    break;
                                case ('Детский гороскоп' ):
                                    $result = self::getScreenVk($user_id, 'vvod-mesta-rozdenia-vk-deti');
                                    break;
                                case ('Гороскоп здоровья'):
                                    $result = self::getScreenVk($user_id, 'vvod-mesta-rozdenia-vk-zdorova');
                                    break;
                                case ('Гороскоп карьеры' ):
                                    $result = self::getScreenVk($user_id, 'vvod-mesta-rozdenia-vk-karery');
                                    break;
                            }

                            break;
                        } else {


                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id, 'vvod-vremeni-rozdenia-vk');

                                break;

                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');
                                break;
                            }
                        }

                        $this->conversation->notes['place_birth'] = $text;
                        $this->conversation->update();

                        if ($order->vidhoroscope!='goroskop-sovmestimosti-partnerov') {
                            $this->conversation->notes['state'] = 10;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'vvod-pocty-vk');
                            break;
                        } else {
                            $text = '';
                        }

                        \Yii::info("                                        state5 {$state} ", 'chat');
                    // no break

                    case 6:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 6;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'vvod-fio-partner-vk');

                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = 5;
                                $this->conversation->update();
                                $typegor = Helper::GetHoroscope($order->vidhoroscope ,$lang);
                                switch ($typegor) {
                                    case ('Гороскоп совместимости' ):
                                        $result = self::getScreenVk($user_id, 'vvod-mesta-rozdenia-vk');
                                        break;
                                    case ('Детский гороскоп' ):
                                        $result = self::getScreenVk($user_id, 'vvod-mesta-rozdenia-vk-deti');
                                        break;
                                    case ('Гороскоп здоровья'):
                                        $result = self::getScreenVk($user_id, 'vvod-mesta-rozdenia-vk-zdorova');
                                        break;
                                    case ('Гороскоп карьеры' ):
                                        $result = self::getScreenVk($user_id, 'vvod-mesta-rozdenia-vk-karery');
                                        break;
                                }

                                break;
                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');
                                break;
                            }

                        }


                        $this->conversation->notes['partner_name'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state6 {$state} ", 'chat');
                    // no break
                    case 7:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 7;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'vvod-datebirth-partner-vk');

                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id, 'vvod-fio-partner-vk');
                                break;

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');
                                break;
                            }

                        }


                        $this->conversation->notes['partner_date_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state7 {$state} ", 'chat');
                    // no break
                    case 8:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 8;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'vvod-timebirth-partner-vk');

                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id, 'vvod-datebirth-partner-vk');
                                break;

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');
                                break;
                            }

                        }


                        $this->conversation->notes['partner_time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state8 {$state} ", 'chat');
                    // no break
                    case 9:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 9;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'vvod-placebirth-partner-vk');

                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = self::getScreenVk($user_id, 'vvod-timebirth-partner-vk');
                                break;

                            }

                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = self::getScreenVk($user_id, 'startovyj-ekran-vk');
                                break;
                            }

                        }


                        $this->conversation->notes['partner_place_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state9 {$state} ", 'chat');
                    // no break

                    case 10:
                        /**
                         *Ввод эл почта
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 10;
                            $this->conversation->update();
                            $result = self::getScreenVk($user_id, 'vvod-pocty-vk');

                            break;


                        } else {
                            if ( !preg_match('/^[-\w.]+@([а-яёА-ЯЁA-z0-9][-а-яёА-ЯЁA-z0-9]+\.)+[а-яёА-ЯЁA-z]{2,6}$/u', $text)) {

                                $txt = 'Неверный ввод email адреса. Повторите ввод.';
                                $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                                $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk([ ],'text'));
                                $result = Request::emptyResponse();
                                break;
                            }



                        }



                        $this->conversation->notes['vvod_email'] = $text;
                        $text = '';
                        \Yii::info("                                        state10 {$state} ", 'chat');
                    // no break

                    case 11:
                        /**
                         * Оплата
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 11;

                            $this->conversation->update();


                            $order = Helper::addActivOrder('activatepodarok',$this->conversation->notes,'vk');

                            switch ($this->conversation->notes['horoscope'] ) {
                                case 'goroskop-zdorova':
                                    Helper::addActivPodarokOrderAmo('orderzdorova',$order,$user_id,'vk');
                                    $tarif = 'zdorova';
                                    break;
                                case 'goroskop-karery':
                                    Helper::addActivPodarokOrderAmo('ordeerkarery',$order,$user_id,'vk');
                                    $tarif = 'karery';
                                    break;
                                case 'detskij-goroskop':
                                    Helper::addActivPodarokOrderAmo('orderdetiy',$order,$user_id,'vk');
                                    $tarif = 'detiy';
                                    break;
                                case 'goroskop-sovmestimosti-partnerov':
                                    Helper::addActivPodarokOrderAmo('orderpartner',$order,$user_id,'vk');
                                    $tarif = 'partner';
                                    break;


                            }


                            Helper::RestorePromo($this->conversation->notes['promo'] );

                            $this->conversation->stop();
                            $txty = self::getScreenVk(  $user_id, 'podarok-polucen-vk'  );

                            break;
                        }

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
                        if ($text == 'getpodarok') {
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
                         * Ввод промо кода
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 1;
                            $this->conversation->update();
                           // $txty = Helper::getMessageScreen('getpodarok1' ,'facebook');
                            $result = Helper::getScreenFb( $user_id, 'getpodarok1' ,$lang);
                            //$botfb->send(new \common\modules\bot\components\facebook\Messages\Message($chat_id,\Yii::t('frontend',$txty,[],$lang) ));
                            $result = Request::emptyResponse();
                            break;
                        }else {
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                            if (!Helper::CheckPromo($text,$user_id)) {
                                $txt = 'Incorrect entry. Repeat please.';
                                $quick_replies[] =  ['content_type'=>'text', 'title'=>'❌ Отмена', 'payload'=>'❌ Отмена'];
                                $botfb->send(new QuickReply($chat_id,\Yii::t('frontend',$txt,[],$lang),$quick_replies));
                                $result = Request::emptyResponse();
                                break;
                            }
                        }
                        $this->conversation->notes['promo'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state1 {$state} ", 'chat');
                    // no break

                    case 2:
                        /**
                         * Выбор гороскопа
                         */
                        if (empty($text)) {
                            $order = BotOrder::find()->where(['promo'=>$this->conversation->notes['promo']])->one();
                            $this->conversation->notes['horoscope'] = $order->vidhoroscope;
                            $this->conversation->notes['state'] = 2;
                            $this->conversation->update();
                            $txt = \Yii::t('frontend','Fine. Presented to you - ',[],$lang ).Helper::GetHoroscope($order->vidhoroscope ,$lang);
                            $botfb->send(new \common\modules\bot\components\facebook\Messages\Message($user_id,\Yii::t('frontend',$txt,[],$lang )));
                            Helper::getScreenFb($chat_id,'getpodarok2' ,$lang);
                            break;
                        }else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'getpodarok1' ,$lang);
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }
                        $this->conversation->notes['yourname'] = $text;
                        $this->conversation->update();
                        $text = '';
                        \Yii::info("                                        state2 {$state} ", 'chat');
                    // no break

                    case 3:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 3;
                            $this->conversation->update();
                            Helper::getScreenFb( $user_id, 'getpodarok2-1' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'getpodarok2' ,$lang);
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
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 4:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 4;
                            $this->conversation->update();
                            Helper::getScreenFb( $user_id, 'getpodarok3' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'getpodarok2-1' ,$lang);
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

                    case 5:
                        /**
                         *
                         */
                        $order = BotOrder::find()->where(['status'=>0,'promo'=>$this->conversation->notes['promo']])->one();
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 5;
                            $this->conversation->update();

                            $typegor = Helper::GetHoroscope($order->vidhoroscope ,$lang);
                            switch ($typegor) {
                                case ('Гороскоп совместимости' ):
                                    $result = Helper::getScreenFb( $user_id, 'getpodarok4' ,$lang);
                                    break;
                                case ('Детский гороскоп' ):
                                    $result = Helper::getScreenFb( $user_id, 'getpodarok4-deti' ,$lang);
                                    break;
                                case ('Гороскоп здоровья'):
                                    $result = Helper::getScreenFb( $user_id, 'getpodarok4-zdorova' ,$lang);
                                    break;
                                case ('Гороскоп карьеры' ):
                                    $result = Helper::getScreenFb( $user_id, 'getpodarok4-karery' ,$lang);
                                    break;
                            }
                            switch ($typegor) {
                                case ('Horoscope of compability'):
                                    $result = Helper::getScreenFb( $user_id, 'getpodarok4' ,$lang);
                                    break;
                                case ('Child horoscope'):
                                    $result = Helper::getScreenFb( $user_id, 'getpodarok4-deti' ,$lang);
                                    break;
                                case ( 'Health horoscope'):
                                    $result = Helper::getScreenFb( $user_id, 'getpodarok4-zdorova' ,$lang);
                                    break;
                                case ( 'Career horoscope'):
                                    $result = Helper::getScreenFb( $user_id, 'getpodarok4-karery' ,$lang);
                                    break;
                            }
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'getpodarok3' ,$lang);
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


                        if ($order->vidhoroscope!='goroskop-sovmestimosti-partnerov') {
                            $this->conversation->notes['state'] = 10;
                            $this->conversation->update();
                            $txty = Helper::getMessageScreen(  'getpodarok5' ,'facebook');
                            $quick_replies[] =  ['content_type'=>'user_email' ];
                            $botfb->send(new QuickReply($chat_id,\Yii::t('frontend',$txty,[],$lang),$quick_replies));
                            $result = Request::emptyResponse();
                            break;
                        } else {
                            $text = '';
                        }
                        \Yii::info("                                        state4 {$state} ", 'chat');
                    // no break
                    case 6:
                        /**
                         * ввод имени партнера
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 6;
                            $this->conversation->update();
                            Helper::getScreenFb( $user_id, 'getpodarok4-1' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->notes['state'] = 4;
                                $this->conversation->update();

                                $typegor = Helper::GetHoroscope($order->vidhoroscope ,$lang);
                                switch ($typegor) {
                                    case ('Гороскоп совместимости' ):
                                        $result = Helper::getScreenFb( $user_id, 'getpodarok4' ,$lang);
                                        break;
                                    case ('Детский гороскоп' ):
                                        $result = Helper::getScreenFb( $user_id, 'getpodarok4-deti' ,$lang);
                                        break;
                                    case ('Гороскоп здоровья'):
                                        $result = Helper::getScreenFb( $user_id, 'getpodarok4-zdorova' ,$lang);
                                        break;
                                    case ('Гороскоп карьеры' ):
                                        $result = Helper::getScreenFb( $user_id, 'getpodarok4-karery' ,$lang);
                                        break;
                                }
                                switch ($typegor) {
                                    case ('Horoscope of compability'):
                                        $result = Helper::getScreenFb( $user_id, 'getpodarok4' ,$lang);
                                        break;
                                    case ('Child horoscope'):
                                        $result = Helper::getScreenFb( $user_id, 'getpodarok4-deti' ,$lang);
                                        break;
                                    case ( 'Health horoscope'):
                                        $result = Helper::getScreenFb( $user_id, 'getpodarok4-zdorova' ,$lang);
                                        break;
                                    case ( 'Career horoscope'):
                                        $result = Helper::getScreenFb( $user_id, 'getpodarok4-karery' ,$lang);
                                        break;
                                }
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }


                        $this->conversation->notes['partner_name'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break
                    case 7:
                        /**
                         * ввод даты рождения партнера
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 7;
                            $this->conversation->update();
                            Helper::getScreenFb( $user_id, 'getpodarok4-2' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'getpodarok4-1' ,$lang);
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }


                        $this->conversation->notes['partner_date_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break
                    case 8:
                        /**
                         * ввод времени рождения партнера
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 8;
                            $this->conversation->update();
                            Helper::getScreenFb( $user_id, 'getpodarok4-3' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'getpodarok4-2' ,$lang);
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }


                        $this->conversation->notes['partner_time_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 9:
                        /**
                         * ввод имени кому подарок
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 9;
                            $this->conversation->update();
                            Helper::getScreenFb( $user_id, 'getpodarok4-4' ,$lang);
                            break;
                        } else {
                            if ($text == '⬅ Назад') {
                                $this->conversation->notes['state'] = $state-1;
                                $this->conversation->update();
                                $result = Helper::getScreenFb( $user_id, 'getpodarok4-3' ,$lang);
                                break;
                            }
                            if ($text == '❌ Отмена') {
                                $this->conversation->stop();
                                $result = Helper::getScreenFb( $user_id, 'startovyj-ekranfb' ,$lang);
                                break;
                            }
                        }


                        $this->conversation->notes['partner_place_birth'] = $text;
                        $this->conversation->update();

                        $text = '';
                        \Yii::info("                                        state3 {$state} ", 'chat');
                    // no break

                    case 10:
                        /**
                         *Ввод эл почта
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 10;
                            $this->conversation->update();
                            $txty = Helper::getMessageScreen(  'getpodarok5' ,'facebook');
                            $quick_replies[] =  ['content_type'=>'user_email' ];
                            $botfb->send(new QuickReply($chat_id,\Yii::t('frontend',$txty,[],$lang),$quick_replies));
                            $result = Request::emptyResponse();
                            break;
                        } else {
                            if ( !preg_match('/^[-\w.]+@([а-яёА-ЯЁA-z0-9][-а-яёА-ЯЁA-z0-9]+\.)+[а-яёА-ЯЁA-z]{2,6}$/u', $text)) {
                                $txt = 'Incorrect entry email address. Repeat please.';
                                $botfb->send(new \common\modules\bot\components\facebook\Messages\Message($chat_id,\Yii::t('frontend',$txt,[],Helper::GetLanguage($chat_id) )));
                                $result = Request::emptyResponse();
                                break;
                            }
                        }
                        $this->conversation->notes['vvod_email'] = $text;
                        $text = '';
                        \Yii::info("                                        state5 {$state} ", 'chat');
                    // no break

                    case 11:
                        /**
                         * Оплата
                         */
                        if (empty($text)) {
                            $this->conversation->notes['state'] = 11;
                            $this->conversation->update();
                            $order = Helper::addActivOrder('activatepodarok',$this->conversation->notes,'facebook');
                            switch ($this->conversation->notes['horoscope'] ) {
                                case 'Health horoscope':
                                    Helper::addActivPodarokOrderAmo('orderzdorova',$order,$user_id,'facebook');
                                    $tarif = 'zdorova';
                                    break;
                                case 'Career horoscope':
                                    Helper::addActivPodarokOrderAmo('ordeerkarery',$order,$user_id,'facebook');
                                    $tarif = 'karery';
                                    break;
                                case 'Child horoscope':
                                    Helper::addActivPodarokOrderAmo('orderdetiy',$order,$user_id,'facebook');
                                    $tarif = 'detiy';
                                    break;
                                case 'Horoscope of compability':
                                    Helper::addActivPodarokOrderAmo('orderpartner',$order,$user_id,'facebook');
                                    $tarif = 'partner';
                                    break;
                            }
                            Helper::RestorePromo($this->conversation->notes['promo'] );
                            $this->conversation->stop();
                            $txty = Helper::getMessageScreen(  'getpodarok6' ,'facebook');
                            $botfb->send(new \common\modules\bot\components\facebook\Messages\Message($chat_id,\Yii::t('frontend',$txty,[],$lang) ));
                            $result = Request::emptyResponse();
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
        $screen_id = Helper::getScreenFromKey($key,'telegram');
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