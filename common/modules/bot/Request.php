<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace   common\modules\bot;

use common\modules\bot\components\facebook\FbBotApp;
use common\modules\bot\components\telegram\Telegram;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use yii\authclient\clients\VKontakte;
use yii\helpers\VarDumper;


class Request
{
    /**
     * @var
     */
    private static $platform;
    private static $platform_name;


    /**
     * URI of the Telegram API
     *
     * @var string
     */
    private static $api_base_uri = ''; //https://api.telegram.org

    /**
     * Guzzle Client object
     *
     * @var \GuzzleHttp\Client
     */
    private static $client;

    /**
     * Input value of the request
     *
     * @var string
     */
    private static $input;

    /**
     * Available actions to send
     *
     * @var array
     */
    private static $actions = [
        'getUpdates',
        'setWebhook',
        'getMe',
        'sendMessage',
        'forwardMessage',
        'sendPhoto',
        'sendAudio',
        'sendDocument',
        'sendSticker',
        'sendVideo',


        'sendInvoice',
        'answerPreCheckoutQuery',

        'sendVoice',
        'sendLocation',
        'sendVenue',
        'sendContact',
        'sendChatAction',
        'getUserProfilePhotos',
        'getFile',
        'kickChatMember',
        'leaveChat',
        'unbanChatMember',
        'getChat',
        'getChatAdministrators',
        'getChatMember',
        'getChatMembersCount',
        'answerCallbackQuery',
        'answerInlineQuery',
        'editMessageText',
        'editMessageCaption',
        'editMessageReplyMarkup',
    ];




    public static function initializeTelegram(Bot $bot)
    {
         \Yii::info("    Иницилизация Request::initializeTelegram ", 'chat');

        if (is_object($bot)) {

            $telegram = new Telegram(getenv("BOT_TOKEN_TELEGRAM"),getenv("BOT_NAME"));
            self::$platform_name = 'telegram';
            self::$platform = $telegram;
            self::$client = new Client(['base_uri' =>'https://api.telegram.org']);
        } else {
            \Yii::info("    Exception ", 'chat');

            throw new \common\modules\bot\Exception('Telegram pointer is empty!');
        }

       // \Yii::info("    Платформа telegram иницилизирована Request подготовлен ".print_r(Request::$platform,true), 'chat');
      //  \Yii::info("     ".print_r(Request::$client,true), 'chat');


    }
    public static function initializeFacebook(Bot $bot)
    {
       // \Yii::info("    Иницилизация Request::initializeFacebook ".self::$api_base_uri, 'chat');

        if (is_object($bot)) {



            $token = env('BOT_TOKEN_FB'); // Verify token

            $facebook = new FbBotApp($token);


            $bot->platform = $facebook;
            self::$platform = $facebook;
            self::$platform_name = 'facebook';
        } else {
            \Yii::info("    Exception ", 'chat');

            throw new \common\modules\bot\Exception('Telegram pointer is empty!');
        }

      //  \Yii::info("    Платформа FbBotApp иницилизирована Request подготовлен ", 'chat');


    }

    public static function initializeVk(Bot $bot)
    {


      //  VarDumper::dump(\Yii::$app->getModule('integration',10,true));

       // \Yii::$app->getModule('integration')->getTokenByUser();
        #TODO
        self::$platform =new \common\modules\bot\components\vk\Bot(env("BOT_TOKEN_VKONTAKTE"));
        self::$platform_name = $bot->client;


    }

    public static function initializeViber(Bot $bot)
    {

        self::$platform_name = 'viber';


    }

//    /**
//     * @param $object
//     * @throws Exception
//     */
//    public static function initialize($object)
//    {
//
//        $telegram = new Telegram(getenv("BOT_TOKEN"),getenv("BOT_NAME"));
//        if (is_object($telegram)) {
//            self::$platform = $telegram;
//            self::$api_base_uri = 'https://api.telegram.org';
//            self::$client = new Client(['base_uri' => self::$api_base_uri]);
//        } else {
//            throw new \common\modules\bot\Exception('pointer is empty!');
//        }
//
//        \Yii::info("    Платформа иницилизирована Request ".self::$api_base_uri, 'chat');
//
//
//        /*
//        получаем платформу и иницилизируем необходимый нам класс
//        */
//
//
//
////        $platform = Request::getPlatform($object);
//
////        switch ($platform) {
////            case 'facebook':
////
////                $telegram = new FbBotApp(getenv("BOT_TOKEN"),getenv("APP_NAME"));
////                if (is_object($telegram)) {
////                    self::$platform = $telegram;
////                    self::$api_base_uri = 'https://api.telegram.org';
////                    self::$client = new Client(['base_uri' => self::$api_base_uri]);
////                } else {
////                    throw new \common\modules\bot\Exception('pointer is empty!');
////                }
////
////                break;
////            case 'telegram':
////
////                \Yii::info("    иницилизируем класс  telegram ", 'chat');
////
////
////                $telegram = new Telegram(getenv("BOT_TOKEN"),getenv("BOT_NAME"));
////                if (is_object($telegram)) {
////                    self::$platform = $telegram;
////                    self::$api_base_uri = 'https://api.telegram.org';
////                    self::$client = new Client(['base_uri' => self::$api_base_uri]);
////                } else {
////                    throw new \common\modules\bot\Exception('pointer is empty!');
////                }
////
////                break;
////            case 'viber':
////
////
////                break;
////
////            case 'vk':
////
////
////
////                break;
////
////        }
//
//
//    }


    public static function getPlatform(){


        $platform=[
            'facebook',
            'telegram',
            'viber',
            'vk',
        ];

        \Yii::info("    отдаем платформу telegram --{$platform[1]}", 'chat');




        return self::$platform;
    }




    /**
     * Set input from custom input or stdin and return it
     *
     * @return string
     */
    public static function getInput()
    {
        // First check if a custom input has been set, else get the PHP input.

            $input = file_get_contents('php://input');


        // Make sure we have a string to work with.
        if (is_string($input)) {
            self::$input = $input;
        } else {
            throw new \common\modules\bot\Exception('Input must be a string!');
        }

        Log::update(self::$input);
        return self::$input;
    }

    /**
     * Generate general fake server response
     *
     * @param array $data Data to add to fake response
     *
     * @return array Fake response data
     */
    public static function generateGeneralFakeServerResponse(array $data = null)
    {
        //PARAM BINDED IN PHPUNIT TEST FOR TestServerResponse.php
        //Maybe this is not the best possible implementation

        //No value set in $data ie testing setWebhook
        //Provided $data['chat_id'] ie testing sendMessage

        $fake_response = ['ok' => true]; // :)

        if (!isset($data)) {
            $fake_response['result'] = true;
        }

        //some data to let iniatilize the class method SendMessage
        if (isset($data['chat_id'])) {
            $data['message_id'] = '1234';
            $data['date'] = '1441378360';
            $data['from'] = [
                'id'         => 123456789,
                'first_name' => 'botname',
                'username'   => 'namebot',
            ];
            $data['chat'] = ['id' => $data['chat_id']];

            $fake_response['result'] = $data;
        }

        return $fake_response;
    }

    /**
     * Execute HTTP Request
     *
     * @param string     $action Action to execute
     * @param array|null $data   Data to attach to the execution
     *
     * @return mixed Result of the HTTP Request
     */
    public static function execute($action, array $data = null)
    {
        $debug_handle = Log::getDebugLogTempStream();





        //Fix so that the keyboard markup is a string, not an object
        if (isset($data['reply_markup']) && !is_string($data['reply_markup'])) {
            $data['reply_markup'] = (string)$data['reply_markup'];
        }

        $request_params = ['debug' => $debug_handle];

        //Check for resources in data
        $contains_resource = false;
        foreach ($data as $item) {
            if (is_resource($item)) {
                $contains_resource = true;
                break;
            }
        }

        //Reformat data array in multipart way
        if ($contains_resource) {
            foreach ($data as $key => $item) {
                $request_params['multipart'][] = array('name' => $key, 'contents' => $item);
            }
        } else {
            $request_params['form_params'] = $data;
        }

        try {

            $response = self::$client->post(
                '/bot' . getenv("BOT_TOKEN_TELEGRAM") . '/' . $action,
                $request_params
            );
            \Yii::info(" Request output:\n%s\n".'/bot' . getenv("BOT_TOKEN_TEELGRAM") . '/' . $action."\r\n\r\n".print_r($request_params,true), 'chat');

        } catch (RequestException $e) {



            \Yii::info("Verbose HTTP Request output:\n%s\n".print_r($e->getMessage(),true), 'chat');

             throw new Exception($e->getMessage());



        } finally {
            //Logging verbose debug output

             //\Yii::info("Verbose HTTP Request output:\n%s\n", 'chat');

        }

        $result = $response->getBody();

        //Logging getUpdates Update
        if ($action === 'getUpdates') {

            \Yii::info("result".print_r($result,true), 'chat');


        }

        return $result;
    }

    /**
     * Download file
     *
     * @param Entities\File $file
     *
     * @return boolean
     */
    public static function downloadFile(File $file)
    {
        $path = $file->getFilePath();

        //Create the directory
        $loc_path = self::$telegram->getDownloadPath() . '/' . $path;

        $dirname = dirname($loc_path);
        if (!is_dir($dirname) && !mkdir($dirname, 0755, true)) {
            throw new Exception('Directory ' . $dirname . ' can\'t be created');
        }

        $debug_handle = Log::getDebugLogTempStream();

        try {
            $response = self::$client->get(
                '/file/bot' . self::$telegram->getApiKey() . '/' . $path,
                ['debug' => $debug_handle, 'sink' => $loc_path]
            );
        } catch (RequestException $e) {
            throw new Exception($e->getMessage());
        } finally {
            //Logging verbose debug output
            Log::endDebugLogTempStream("Verbose HTTP File Download Request output:\n%s\n");
        }

        return (filesize($loc_path) > 0);
    }

    /**
     * Encode file
     *
     * @param string $file
     *
     * @return resource
     */



    protected static function encodeFile($file)
    {
        $fp = fopen($file, 'r');
        if ($fp === false) {
            throw new Exception('Cannot open ' . $file . ' for reading');
        }
        return $fp;
    }

    /**
     * @param $action
     * @param array|null $data
     * @return ServerResponse
     * @throws Exception
     */
    public static function send($action, array $data = null)
    {
        if (!in_array($action, self::$actions)) {
            throw new Exception('The action ' . $action . ' doesn\'t exist!');
        }
        //$bot_name = self::$client->getBotName();
        $bot_name  =getenv('APP_NAME');
        $response = json_decode(self::execute($action, $data), true);
        \Yii::info("Отправляем запрос от {$bot_name} получен ответ  " . print_r($response['ok'],true), 'chat');
        if (is_null($response)) {
            throw new Exception('Telegram returned an invalid response! Please your bot name and api token.');
        }

        return new ServerResponse($response, $bot_name);
    }

    /**
     * Get me
     *
     * @return mixed
     */
    public static function getMe()
    {
        // Added fake parameter, because of some cURL version failed POST request without parameters
        // see https://github.com/akalongman/php-telegram-bot/pull/228
        return self::send('getMe', ['whoami']);
    }

    /**
     * Send message
     *
     * @todo Could do with some cleaner recursion
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function sendMessage(array $data)
    {




        if (empty($data)) {
            throw new Exception('Data is empty!');
        }
        $text = $data['text'];
        $string_len_utf8 = mb_strlen($text, 'UTF-8');
        if ($string_len_utf8 > 4096) {
            $data['text'] = mb_substr($text, 0, 4096);
            self::send('sendMessage', $data);
            $data['text'] = mb_substr($text, 4096, $string_len_utf8);
            return self::sendMessage($data);
        }
        return self::send('sendMessage', $data);
    }

    public static function answerPreCheckoutQuery(array $data)
    {
        if (empty($data)) {
            throw new  Exception('Data is empty!');
        }

        return self::send('answerPreCheckoutQuery', $data);
    }

    /**
     * Forward message
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function forwardMessage(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('forwardMessage', $data);
    }

    /**
     * Send photo
     *
     * @param array $data
     * @param string $file
     *
     * @return mixed
     */
    public static function sendPhoto(array $data, $file = null)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        if (!is_null($file)) {
            $data['photo'] = self::encodeFile($file);
        }

        return self::send('sendPhoto', $data);
    }

    /**
     * Send audio
     *
     * @param array  $data
     * @param string $file
     *
     * @return mixed
     */
    public static function sendAudio(array $data, $file = null)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        if (!is_null($file)) {
            $data['audio'] = self::encodeFile($file);
        }

        return self::send('sendAudio', $data);
    }

    /**
     * Send document
     *
     * @param array  $data
     * @param string $file
     *
     * @return mixed
     */
    public static function sendDocument(array $data, $file = null)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        if (!is_null($file)) {
            $data['document'] = self::encodeFile($file);
        }

        return self::send('sendDocument', $data);
    }

    /**
     * Send sticker
     *
     * @param array  $data
     * @param string $file
     *
     * @return mixed
     */
    public static function sendSticker(array $data, $file = null)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        if (!is_null($file)) {
            $data['sticker'] = self::encodeFile($file);
        }

        return self::send('sendSticker', $data);
    }

    /**
     * Send video
     *
     * @param array  $data
     * @param string $file
     *
     * @return mixed
     */
    public static function sendVideo(array $data, $file = null)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        if (!is_null($file)) {
            $data['video'] = self::encodeFile($file);
        }

        return self::send('sendVideo', $data);
    }

    /**
     * Send voice
     *
     * @param array  $data
     * @param string $file
     *
     * @return mixed
     */
    public static function sendVoice(array $data, $file = null)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        if (!is_null($file)) {
            $data['voice'] = self::encodeFile($file);
        }

        return self::send('sendVoice', $data);
    }

    /**
     * Send location
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function sendLocation(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('sendLocation', $data);
    }

    /**
     * Send venue
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function sendVenue(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('sendVenue', $data);
    }

    /**
     * Send contact
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function sendContact(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('sendContact', $data);
    }

    /**
     * Send chat action
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function sendChatAction(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('sendChatAction', $data);
    }

    /**
     * Get user profile photos
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function getUserProfilePhotos(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        if (!isset($data['user_id'])) {
            throw new Exception('User id is empty!');
        }

        return self::send('getUserProfilePhotos', $data);
    }

    /**
     * Get updates
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function getUpdates(array $data)
    {
        return self::send('getUpdates', $data);
    }

    /**
     * Set webhook
     *
     * @param string $url
     * @param string $file
     *
     * @return mixed
     */
    public static function setWebhook($url = '', $file = null)
    {
        $data = ['url' => $url];

        if (!is_null($file)) {
            $data['certificate'] = self::encodeFile($file);
        }

        return self::send('setWebhook', $data);
    }

    /**
     * Get file
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function getFile(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('getFile', $data);
    }

    /**
     * Kick Chat Member
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function kickChatMember(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('kickChatMember', $data);
    }

    /**
     * Leave Chat
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function leaveChat(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('leaveChat', $data);
    }

    /**
     * Unban Chat Member
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function unbanChatMember(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('unbanChatMember', $data);
    }

    /**
     * Get Chat
     *
     * @todo add get response in ServerResponse.php?
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function getChat(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('getChat', $data);
    }

    /**
     * Get Chat Administrators
     *
     * @todo add get response in ServerResponse.php?
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function getChatAdministrators(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('getChatAdministrators', $data);
    }

    /**
     * Get Chat Members Count
     *
     * @todo add get response in ServerResponse.php?
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function getChatMembersCount(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('getChatMembersCount', $data);
    }

    /**
     * Get Chat Member
     *
     * @todo add get response in ServerResponse.php?
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function getChatMember(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('getChatMember', $data);
    }

    /**
     * Answer callback query
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function answerCallbackQuery(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('answerCallbackQuery', $data);
    }

    /**
     * Answer inline query
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function answerInlineQuery(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('answerInlineQuery', $data);
    }

    /**
     * Edit message text
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function editMessageText(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('editMessageText', $data);
    }

    /**
     * Edit message caption
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function editMessageCaption(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('editMessageCaption', $data);
    }

    /**
     * Edit message reply markup
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function editMessageReplyMarkup(array $data)
    {
        if (empty($data)) {
            throw new Exception('Data is empty!');
        }

        return self::send('editMessageReplyMarkup', $data);
    }

    /**
     * Return an empty Server Response
     *
     * No request to telegram are sent, this function is used in commands that
     * don't need to fire a message after execution
     *
     * @return Entities\ServerResponse
     */
    public static function emptyResponse()
    {
        return new ServerResponse(['ok' => true, 'result' => true], null);
    }


    public static function sendInvoice(array $data)
    {
        if (empty($data)) {
            throw new  Exception('Data is empty!');
        }

        return self::send('sendInvoice', $data);
    }
    /**
     * Send message to all active chats
     *
     * @param string  $callback_function
     * @param array   $data
     * @param boolean $send_groups
     * @param boolean $send_super_groups
     * @param boolean $send_users
     * @param string  $date_from
     * @param string  $date_to
     *
     * @return array
     */
    public static function sendToActiveChats(
        $callback_function,
        array $data,
        $send_groups = true,
        $send_super_groups = true,
        $send_users = true,
        $date_from = null,
        $date_to = null
    ) {
        $callback_path = __NAMESPACE__ . '\Request';
        if (!method_exists($callback_path, $callback_function)) {
            throw new Exception('Method "' . $callback_function . '" not found in class Request.');
        }

        $chats = DB::selectChats($send_groups, $send_super_groups, $send_users, $date_from, $date_to);

        $results = [];
        foreach ($chats as $row) {
            $data['chat_id'] = $row['chat_id'];
            $results[] = call_user_func_array($callback_path . '::' . $callback_function, [$data]);
        }

        return $results;
    }
}
