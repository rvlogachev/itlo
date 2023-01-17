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
use common\modules\bot\components\Helper;
use common\modules\bot\components\telegram\Entities\InlineKeyboardButton;
use common\modules\bot\components\telegram\Entities\InlineKeyboardMarkup;
use common\modules\bot\components\viber\Api\Message\Text;
use common\modules\bot\components\viber\Api\Sender;

use common\modules\bot\Conversation;
use common\modules\bot\models\BotButtons;
use common\modules\bot\models\BotScreens;
use common\modules\bot\models\Client;
use common\modules\bot\models\WidgetText;
use common\modules\bot\Request;
use common\models\BotUser;
use common\models\TimelineEvent;
use common\models\UserRef;

/**
 * Projects command
 */
class StartinfoCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'startinfo';
    protected $description = 'Startinfo command';
    protected $usage = '/startinfo';
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

            $user_id = $input['entry'][0]['id'];
            $chat_id = $input['entry'][0]['id'];
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

        if ($this->platform->client == 'whatsapp') {
            $inputWhatsApp = json_decode(file_get_contents('php://input'));
            $sender_id = $inputWhatsApp->messages[0]->author;
            $chat_id = $inputWhatsApp->messages[0]->chatId;
            $user_id = $inputWhatsApp->messages[0]->chatId;



            if($inputWhatsApp->messages[0]->fromMe || $sender_id!=$chat_id){

                \Yii::info("Сообщения отправитель не совпадает с чатом  sender_id {$sender_id}  | chat_id  {$chat_id} ", 'chat');
                return Request::emptyResponse();
            }

            $text = $inputWhatsApp->messages[0]->body;
            $FirstName = $inputWhatsApp->messages[0]->senderName;
            $LastName =  $inputWhatsApp->messages[0]->chatName;

        }

        \Yii::info("TEXT ---   " . $text, 'chat');
        \Yii::info("CHAT_ID ---   " . $chat_id, 'chat');
        \Yii::info("PLATFORM ---   " . $this->platform->client, 'chat');

        // Helper::addUser($this->platform->client,$user_id,$FirstName,$LastName);





        switch ($this->platform->client) {


            case 'whatsapp':

                //  //Conversation projects
                $conversation = new Conversation($user_id, $chat_id, $this->getName());


                //cache data from the tracking session if any
                \Yii::info("isset   ---   " . print_r(isset($conversation->notes['state']),true), 'chat');


                if ( isset($conversation->notes['state'])) {
                    $state = $conversation->notes['state'];
                    $conversation->notes['command_name'] = $this->getName();
                    \Yii::info("isset   ---   " . print_r($state ,true), 'chat');

                    $conversation->update();
                }
                \Yii::info("NOTES  ---   " . print_r($conversation->notes,true), 'chat');
                  \Yii::info("STATE  ---   " . print_r($state,true), 'chat');



                switch ($state) {
                    case 0:

                        $conversation->notes['state'] = 0;
                        $conversation->notes['main_step_key'] =$this->key;
                        $conversation->update();

                        $text = '';
                        \Yii::info("Шаги тунеля   STATE   0", 'chat');
                    // no break
                    case $conversation->notes['state']:
                        \Yii::info("Шаги тунеля   STATE   1", 'chat');
                        if (empty($text)) {
                            $conversation->notes['state'] = $conversation->notes['state']+1;
                            $conversation->update();
                            $cdm = \common\modules\chat\components\Helper::addMessageDbBot($conversation->notes['main_step_key'],(string)$user_id,'in',$this->platform->client );
                            $txtout = Helper::getScreenWhatsapp($user_id,$conversation->notes['main_step_key']);
                            $cdm = \common\modules\chat\components\Helper::addMessageDbBot($txtout,(string)$user_id,'out',$this->platform->client);
                            \Yii::info("NOTES  ---   " . print_r($conversation->notes,true), 'chat');
                        } else {
                            \Yii::info("last screen  ---   " . print_r($conversation->notes['main_step_key'],true), 'chat');





                            $screenkey = BotScreens::find()->where(['key'=>$conversation->notes['main_step_key']])->one();
                            if ($screenkey) {
                                \Yii::info("есть screen  ---   " . print_r($conversation->notes['main_step_key'],true), 'chat');

                                $screenmess = WidgetText::find()->where(['screens_id'=>$screenkey->id])->all();
                                $btn = [];
                                foreach ($screenmess as $mes) {
                                    $btn = BotButtons::find()->where(['widget_text_id'=>$mes->id])->asArray()->all();
                                }
                                \Yii::info("массив кнопок screen  ---   " . print_r($btn,true), 'chat');
                                $yesno   = [];
                                foreach ($btn as $button) {
                                    if ('stop' ==  $button['callback_data'] && $text == $button['text']) {
                                        \Yii::info("stop  ---   " . print_r($button['callback_data'],true), 'chat');
                                        $conversation->stop();
                                    }

                                    if ($text == $button['text'] || $text == $button['callback_data']) {
                                        $yesno [] = $button['callback_data'];
                                    }
                                }

                                if ($yesno) {
                                    \Yii::info("текст совпал скрин  ---   " . print_r($yesno,true), 'chat');
                                    \Yii::info("NOTES  ---   " . print_r($conversation->notes,true), 'chat');

                                    $conversation->notes['main_step_key'] = $yesno[0];
                                    $conversation->notes['state'] = $state+1;
                                    $conversation->update();
                                    $cdm = \common\modules\chat\components\Helper::addMessageDbBot($conversation->notes['main_step_key'],(string)$user_id,'in',$this->platform->client );
                                    $txtout = Helper::getScreenWhatsapp($user_id,$conversation->notes['main_step_key']);
                                    $cdm = \common\modules\chat\components\Helper::addMessageDbBot($txtout,(string)$user_id,'out',$this->platform->client);
                                    break;
                                } else {
                                    $result = Helper::sendMessageWhatsapp('Пожалуйста, выберите пункт в меню', $user_id);
                                    \Yii::info("неверный выбор  ---   " , 'chat');
                                    break;
                                }



                            }




                        }
                        break;


                }




                $result = Request::emptyResponse();

        }



        return $result;
    }
}
