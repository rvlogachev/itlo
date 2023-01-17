<?php

namespace common\modules\bot\controllers;
use common\modules\bot\components\Helper;
use common\modules\bot\models\BotButtons;
use common\modules\bot\models\BotScreens;
use common\modules\bot\models\form\SendUserForm;
use common\modules\bot\models\UserBot;
use common\modules\bot\models\WidgetText;
use common\modules\bot\Request;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{

    public $layout = '@backend/themes/adminlte/views/layouts/common';


    public function beforeAction($action)
    {

            $this->enableCsrfValidation = false;


        return parent::beforeAction($action);
    }



    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'telegram' => ['post'],
//                    'vk' => ['post'],
                ],
            ],
        ];
    }


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],

            'telegram' => [
                'class' => 'common\modules\bot\controllers\Actions\TelegramAction'
            ],
            'facebook' => [
                'class' => 'common\modules\bot\controllers\Actions\FacebookAction'
            ],
            'vk' => [
                'class' => 'common\modules\bot\controllers\Actions\VkAction'
            ],
            'viber' =>[
                'class' => 'common\modules\bot\controllers\Actions\ViberAction'
            ],

            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale'=>[
                'class'=>'common\actions\SetLocaleAction',
                'locales'=>array_keys(\Yii::$app->params['availableLocales'])
            ]
        ];
    }


    public function actionSendUser($screen_id)
    {
        $result = [];
        $model = BotScreens::findOne($screen_id);

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            foreach ($post['SendUserForm']['users'] as $user) {

                $botuser = UserBot::findOne($user);
                $screen =BotScreens::findOne($screen_id);

                if ($botuser && $screen) {
                    if ($botuser->platform =='vk') {

                         self::getScreenVk($user, $screen->key);

                    }
                    if ($botuser->platform =='telegram') {

                        self::getScreen($user, $user, $screen->key, true);
                    }
                }


            }

            return $this->render('successsend', [
                    'users'=>$post['SendUserForm']['users'],
            'screen_id'=>$screen_id
            ]);
        }



        $sendform = new SendUserForm();

        $arr = [];
        foreach (UserBot::find()->all() as $user ) {
            $arr [$user->id] = '<span class="label label-success"> '.$user->id.'</span> '.$user->username.' '.$user->first_name.' '.$user->last_name.' <span class="label label-info"> '.$user->platform.'</span>';
        }


        $sendform->screen =  $screen_id;
        return $this->render('senduser', [
            'model'=>$sendform,
            'arr'=>$arr
        ]);
    }



    public static function getScreen($user_id,$chat_id, $key, $keyboardHide = false)
    {

        $bot = new \common\modules\bot\Bot('telegram');


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
