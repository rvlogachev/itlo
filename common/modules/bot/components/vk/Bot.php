<?php
/**
 * Created by PhpStorm.
 * User: visural
 * Date: 18.06.18
 * Time: 19:15
 */

namespace common\modules\bot\components\vk;

use common\modules\bot\components\Helper;
use common\modules\bot\components\vk\Exception;

use common\modules\bot\models\BotImgId;
use common\modules\bot\models\BotMessageImage;
use common\modules\bot\Platform;
use common\modules\bot\models\BenImgId;
use common\modules\bot\models\MessageVk;
use common\modules\bot\models\Settings;


class Bot extends Platform
{



    public $token;

    public $input;
    public $mysql_enabled;
    protected $commands_config = [];
    const VK_API_ENDPOINT = 'https://api.vk.com/method/';
    const VK_API_VERSION = '5.80';




    public function __construct($token)
    {

        $this->token == $token;



    }


    /**
     * @param $user_id
     * @param $peer_id
     * @param $message_id
     * @param $message
     * @param array $keyboard
     * @param bool $payload
     * @param int $group_id
     * @param string $attachments
     * @return mixed
     */
    function vkApi_messagesEdit($user_id, $peer_id, $message_id, $message, $keyboard = [], $payload = false, $group_id , $attachments = '')
    {

        return $this->_vkApi_call('messages.edit', [
            // 'user_id'    =>$user_id, // $peer_id,
            'peer_id' => $peer_id, // $peer_id,
            'message' => $message,
            'message_id' => $message_id,
            // 'group_id'    => $group_id,
            // 'keyboard'    => $keyboard,


        ]);


    }


    function vkApi_messagesSend($user_id, $peer_id, $message, $keyboard = [], $payload = false, $group_id ='' , $attachments = false)
    {



        $group_id= $settings =env("GROUP_VK");;

        if ($attachments) {
            if ($message) {
                return $this->_vkApi_call('messages.send', [
                    'user_id' => $user_id,
                    'message' => $message,
                    'attachment' => $attachments
                ]);
            } else {
                return $this->_vkApi_call('messages.send', [
                    'user_id' => $user_id,
                    'attachment' => $attachments
                ]);
            }
        } else {
            return $this->_vkApi_call('messages.send', [
                'user_id' => $user_id, // $peer_id,
                'peer_id' => $peer_id, // $peer_id,
                'message' => $message,
                'group_id' => $group_id,
                'keyboard' => $keyboard,
                // 'payload'       =>$payload,
                //  'attachment' =>  $attachments
            ]);
        }
    }
    public function isDbEnabled()
    {
        if ($this->mysql_enabled) {
            return true;
        } else {
            return false;
        }
    }

    function vkApi_usersGet($user_id)
    {
        return $this->_vkApi_call('users.get', array(
            'user_id' => $user_id,
        ));
    }


    function vkApi_getProfileinfo()
    {
        return $this->_vkApi_call('account.getProfileInfo');
    }


    function vkApi_photosGetMessagesUploadServer($peer_id)
    {
        return $this->_vkApi_call('photos.getMessagesUploadServer', array(
            'peer_id' => $peer_id,
        ));
    }

    function vkApi_photosSaveMessagesPhoto($photo, $server, $hash)
    {
        return $this->_vkApi_call('photos.saveMessagesPhoto', array(
            'photo' => $photo,
            'server' => $server,
            'hash' => $hash,
        ));
    }

    function vkApi_docsGetMessagesUploadServer($peer_id, $type)
    {
        return $this->_vkApi_call('docs.getMessagesUploadServer', array(
            'peer_id' => $peer_id,
            'type' => $type,
        ));
    }

    function vkApi_docsSave($file, $title)
    {
        return $this->_vkApi_call('docs.save', array(
            'file' => $file,
            'title' => $title,
        ));
    }






    function _vkApi_call($method, $params = array())
    {


        $params['payload'] = json_encode(['backend' => true], JSON_UNESCAPED_UNICODE);
        // $params['random_id'] =1112113321;


        $settings =env("BOT_TOKEN_VKONTAKTE");


        $params['access_token'] = $settings;
        $params['v'] = $this::VK_API_VERSION;


        \Yii::info(" _vkApi_call   method " . print_r($method, true), 'chat');
        \Yii::info(" _vkApi_call   params " . print_r($params, true), 'chat');


        $query = http_build_query($params);
        $url = $this::VK_API_ENDPOINT . $method . '?' . $query;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {
            $this->log_error($error);

        }
        curl_close($curl);
        $response = json_decode($json, true);
        if (!$response || !isset($response['response'])) {
            $this->log_error($json);

        }

        if ($method == 'messages.send') {
            \Yii::info("updateSql   {$method}   ", 'chat');
            $this->updateSql($params, isset($response['response']) ? $response['response'] : 0);

        }


        \Yii::info(" _vkApi_call   return from {$method}   " , 'chat');
        return isset($response['response']) ? $response['response'] : $response['error'];
    }

    function vkApi_upload($url, $file_name)
    {


        $file = $file_name;


        \Yii::info(" vkApi_upload  url  {$url} ", 'chat');
        \Yii::info(" vkApi_upload  file_name  {$file} ", 'chat');


        if (file_exists($file)) {
            \Yii::info("     file_exists ", 'chat');
        } else {
            \Yii::info("   no   file_exists ", 'chat');
        }
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, array('file' => new \CURLFile($file)));
        $json = curl_exec($curl);
        $error = curl_error($curl);
        if ($error) {
            $this->log_error($error);

        }
        curl_close($curl);
        $response = json_decode($json, true);
        if (!$response) {

        }
        \Yii::info("  vkApi_upload  return " . print_r($response, true), 'chat');
        return $response;
    }

    function log_error($txt)
    {

    }


    /**
     * Загрузка фотографии в сообщение от бота
     * @param $user_id
     * @param $file_name
     * @param $img_id
     * @return mixed
     */
    function uploadPhoto($user_id, $file_name, $img_id = 0, $sizes = '', $prim = '')
    {

        $upload_server_response = $this->vkApi_photosGetMessagesUploadServer($user_id);

        \Yii::info(" upload_server_response " . print_r($upload_server_response, true), 'chat');


        if(isset($upload_server_response['upload_url'])){
            $upload_response = $this->vkApi_upload($upload_server_response['upload_url'], $file_name);
            \Yii::info(" upload_response " . print_r($upload_response, true), 'chat');
            $save_response=[];
            $save_response = $this->vkApi_photosSaveMessagesPhoto($upload_response['photo'], $upload_response['server'], $upload_response['hash']);


            \Yii::info(" save_response " . print_r($save_response, true), 'chat');


            $imgModel = BotImgId::find()->where(['user_id'=>$user_id,'prim'=>$prim])->one();
            if($imgModel && isset($save_response[0]) && isset($save_response[0]['id'])){
                $imgModel->vk_id = $save_response[0]['id'];
                $imgModel->album_id = $save_response[0]['album_id'];
                $imgModel->owner_id = $save_response[0]['owner_id'];
                $imgModel->user_id = $user_id;
                if($img_id){
                    $imgModel->img_id = (int)$img_id;
                }

                $imgModel->sizes = $sizes;
                $imgModel->prim = $prim;
                if (!$imgModel->update()) {
                    \Yii::info(" ERROR SAVE DB  " . print_r($imgModel->getErrors(), true), 'chat');
                }
            }else{
                $image_id = new BotImgId();
                if (isset($save_response[0]) ) {

                    $image_id->album_id = $save_response[0]['album_id'];
                    $image_id->owner_id = $save_response[0]['owner_id'];
                    $image_id->vk_id = $save_response[0]['id'];
                }

                if($img_id){
                    $image_id->img_id = (int)$img_id;
                }
                $image_id->user_id = $user_id;
                $image_id->sizes = $sizes;
                $image_id->prim = $prim;
                if (!$image_id->save()) {
                    \Yii::info(" ERROR SAVE DB  " . print_r($image_id->getErrors(), true), 'chat');
                }
            }
            return array_pop($save_response);

        }
            return false;







    }
    function uploadDoc($user_id, $file_name, $img_id = false, $sizes = '', $prim = '')
    {

        $upload_server_response = $this->vkApi_docsGetMessagesUploadServer($user_id,'doc');
        $upload_response = $this->vkApi_upload($upload_server_response['upload_url'], $file_name);
        \Yii::info(" DOC upload_response " . print_r($upload_response, true), 'chat');

        $ModelImages =  BotMessageImage::findOne($img_id);

        $save_response = $this->vkApi_docsSave($upload_response['file'], $ModelImages->name);


        $imgModel = BotImgId::find()->where(['user_id'=>$user_id,'prim'=>$prim])->one();
        if($imgModel){
            $imgModel->vk_id = $save_response[0]['id'];
            $imgModel->url = $save_response[0]['url'];
            $imgModel->owner_id = $save_response[0]['owner_id'];
            $imgModel->user_id = $user_id;
            if($img_id){
                $imgModel->img_id = (int)$img_id;
            }

            $imgModel->sizes = $sizes;
            $imgModel->prim = $prim;
            if (!$imgModel->update()) {
                \Yii::info(" ERROR SAVE DB  " . print_r($imgModel->getErrors(), true), 'chat');
            }
        }else{
            $image_id = new BotImgId();
            $imgModel->url = $save_response[0]['url'];
            $image_id->owner_id = $save_response[0]['owner_id'];
            $image_id->vk_id = $save_response[0]['id'];
            if($img_id){
                $image_id->img_id = (int)$img_id;
            }
            $image_id->user_id = $user_id;
            $image_id->sizes = $sizes;
            $image_id->prim = $prim;
            if (!$image_id->save()) {
                \Yii::info(" ERROR SAVE DB  " . print_r($image_id->getErrors(), true), 'chat');
            }
        }




        return array_pop($save_response);
    }
    public function getCustomInput($input)
    {
        $this->input = $input;
        return $this;
    }


    public function updateSql($psrams, $response)
    {

        \Yii::info("updateSql " . print_r($response, true), 'chat');


        $modelMessageVk = new MessageVk();
        $modelMessageVk->date = time();
        $modelMessageVk->from_id = isset($psrams['user_id']) ? $psrams['user_id'] : "";
        if (isset($psrams['message'])) {
            $modelMessageVk->text = $psrams['message'];
        }
        if (isset($psrams['keyboard'])) {
            $modelMessageVk->keyboard = $psrams['keyboard'];
        }
        if (isset($psrams['attachment'])) {
            $modelMessageVk->attachments = $psrams['attachment'];
        }
        $modelMessageVk->payload = $psrams['payload'];
        $modelMessageVk->inout = 'output';
        $modelMessageVk->response = $response;

        if (!$modelMessageVk->save()) {
            \Yii::info("no save_data !!!! message_vk" . print_r($modelMessageVk->getErrors(), true), 'chat');
        }

    }
    public function getCommandConfig($command)
    {
        return isset($this->commands_config[$command]) ? $this->commands_config[$command] : [];
    }

}