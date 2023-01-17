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

use common\models\Clients;
use common\models\Dialogs;
use common\modules\bot\commands\SystemCommand;
use common\modules\bot\components\facebook\FbBotApp;
use common\modules\bot\components\facebook\Messages\Message;
use common\modules\bot\components\facebook\Messages\MessageButton;
use common\modules\bot\components\facebook\Messages\StructuredMessage;
use common\modules\bot\components\Helper;
use common\modules\bot\components\viber\Api\Message\Text;
use common\modules\bot\components\viber\Api\Sender;

use common\modules\bot\models\UserBot;
use common\modules\bot\Request;
use common\models\BotUser;
use common\models\TimelineEvent;
use common\models\UserRef;
use yii\httpclient\Client;

/**
 * Start command
 */
class StopCommand extends SystemCommand
{
    /**#@+
     * {@inheritdoc}
     */
    protected $name = 'stop';
    protected $description = 'stop command';
    protected $usage = '/stop';
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

            if (isset($dataVk->object->payload)) {
                $payload = json_decode($dataVk->object->payload, true);
                if (isset($payload)) {
                    $text = isset($payload['button']) ? $payload['button'] : '';
                } else {
                    $text = $dataVk->object->text;
                }
            } else {
                $text = $dataVk->object->text;
            }


            if (isset($dataVk->object->payload)) {

            }

            $user_first_name = 'vk';
            $user_user_name = 'vk';

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


        switch ($this->platform->client) {


            case 'telegram':

                $user = UserBot::find()->where(['id' => $user_id])->one();

                if ($user->status == 1) {
                    $amo = \Yii::$app->amocrm->getClient();
                    $search_cont = $amo->contact->apiList([
                        'query' => $user_id,
                        'limit_rows' => 1,
                    ]);
                    if ($search_cont) {
                        $new_contact = $search_cont[0]['id'];


                        $contact = $amo->contact;
                        $contact->addCustomField(616093, 'Нет');

                        $contact->apiUpdate((int)$new_contact, 'now');
                    }


                    $user->status = 0;
                    if ($user->update()) {
                        $data['text'] = 'Вы успешно отписаны от ежедневной рассылки гороскопа.';
                        $data['chat_id'] = $user_id;
                        $result = Request::sendMessage($data);
                        $result = Request::emptyResponse();
                    } else {
                        $data['text'] = 'Произошла ошибка при попытке отписаться от бесплатной рассылки. ';
                        $data['chat_id'] = $user_id;

                        $result = Request::sendMessage($data);
                        $result = Request::emptyResponse();
                    }


                } else {

                    $data['text'] = 'Вы еще не подписаны на рассылку.';
                    $data['chat_id'] = $user_id;
                    $result = Request::sendMessage($data);
                    $result = Request::emptyResponse();
                    break;


                }


                break;

            case 'facebook':
                $botfb = new FbBotApp(env('BOT_TOKEN_FB'));

                $user = UserBot::find()->where(['id' => $user_id])->one();
                \Yii::info("    txt " . print_r(\Yii::t('user_id', $user_id), true), 'chat');

                if ($user) {
                    if ($user->status == 1) {
                        $amo = \Yii::$app->amocrm->getClient();
                        $search_cont = $amo->contact->apiList([
                            'query' => $user_id,
                            'limit_rows' => 1,
                        ]);
                        if ($search_cont) {
                            $new_contact = $search_cont[0]['id'];


                            $contact = $amo->contact;
                            $contact->addCustomField(616093, 'Нет');

                            $contact->apiUpdate((int)$new_contact, 'now');
                        }


                        $user->status = 0;


                        if ($user->update()) {
                            $data['text'] = 'You have successfully unsubscribed from the daily horoscope newsletter.';

                            $result = $botfb->send(new StructuredMessage($user_id,
                                StructuredMessage::TYPE_BUTTON,
                                [
                                    'text' => \Yii::t('frontend', $data['text'], [], Helper::GetLanguage($user_id)),
                                    'buttons' => [
                                        new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend', 'MENU', [], Helper::GetLanguage($user_id))),
                                    ]
                                ]));
                        } else {
                            $data['text'] = 'An error occurred while trying to unsubscribe from the free newsletter.';
                            $result = $botfb->send(new StructuredMessage($user_id,
                                StructuredMessage::TYPE_BUTTON,
                                [
                                    'text' => \Yii::t('frontend', $data['text'], [], Helper::GetLanguage($user_id)),
                                    'buttons' => [
                                        new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend', 'MENU', [], Helper::GetLanguage($user_id))),
                                    ]
                                ]));

                        }


                        \Yii::info("    end " . print_r(\Yii::t('user_id', $user_id), true), 'chat');


                    } else {
                        \Yii::info("    otpisjka " . print_r(\Yii::t('user_id', $user_id), true), 'chat');

                        $data['text'] = 'You are not yet subscribed to the newsletter.';
                        $result = $botfb->send(new StructuredMessage($user_id,
                            StructuredMessage::TYPE_BUTTON,
                            [
                                'text' => \Yii::t('frontend', $data['text'], [], Helper::GetLanguage($user_id)),
                                'buttons' => [
                                    new MessageButton(MessageButton::TYPE_POSTBACK, \Yii::t('frontend', 'MENU', [], Helper::GetLanguage($user_id))),
                                ]
                            ]));
                        $result = Request::emptyResponse();
                        break;

                    }
                } else {

                    $data['text'] = 'There is no such user in the system, contact the owner.';
                    $result = $botfb->send(new StructuredMessage($user_id,
                        StructuredMessage::TYPE_BUTTON,
                        [
                            'text' => \Yii::t('frontend', $data['text'], [], Helper::GetLanguage($user_id)),
                            'buttons' => [
                                new MessageButton(MessageButton::TYPE_POSTBACK, 'Меню'),
                            ]
                        ]));
                    $result = Request::emptyResponse();
                    break;

                }


                $result = Request::emptyResponse();
                break;

            case 'viber':

                $data['text'] = 'id= ' . $user_id;
                $botSender = new Sender([
                    'name' => getenv('BOT_VIBER_NAME'),
                    'avatar' => getenv('BOT_VIBER_AVATAR'),
                ]);
                $botViber = new \common\modules\bot\components\viber\Bot(['token' => getenv('BOT_VIBER_TOKEN')]);


                $result = $botViber->getClient()->sendMessage(
                    (new Text())->setSender($botSender)
                        ->setReceiver($user_id)
                        ->setText($data['text'])

                );


                break;

            case 'vk':

                $user = UserBot::find()->where(['id' => $user_id])->one();

                if ($user->status == 1) {
                    $amo = \Yii::$app->amocrm->getClient();
                    $search_cont = $amo->contact->apiList([
                        'query' => $user_id,
                        'limit_rows' => 1,
                    ]);
                    if ($search_cont) {
                        $new_contact = $search_cont[0]['id'];


                        $contact = $amo->contact;
                        $contact->addCustomField(616093, 'Нет');

                        $contact->apiUpdate((int)$new_contact, 'now');
                    }


                    $user->status = 0;
                    if ($user->update()) {

                        $txt = 'Вы успешно отписаны от ежедневной рассылки гороскопа.';
                        $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                        $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk(['menu'=>'Меню' ],'text'));
                        $result = Request::emptyResponse();

                    } else {

                        $txt = 'Произошла ошибка при попытке отписаться от бесплатной рассылки. ';
                        $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                        $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk(['menu'=>'Меню' ],'text'));
                        $result = Request::emptyResponse();

                    }


                } else {


                    $txt = 'Вы еще не подписаны на рассылку.';

                    $this->platform = new \common\modules\bot\components\vk\Bot(env('BOT_TOKEN_VKONTAKTE'));
                    $result = $this->platform->vkApi_messagesSend($user_id, '-' . $group_id, $txt, Helper::getBtnVk(['menu'=>'Меню' ],'text'));
                    $result = Request::emptyResponse();

                    break;


                }




        }
        return $result;
    }
}
