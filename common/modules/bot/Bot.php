<?php
/*/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace common\modules\bot;

use common\modules\bot\commands\Command;
use common\modules\bot\models\BotSettings;
use common\modules\bot\models\Settings;


/**
 * Class Bot
 * @package backend\modules\bot\components
 */
class Bot
{
    /**
     * Version
     *
     * @var string
     */
    protected $version = '0.0.1';


    public $client = '';

    /**
     * Telegram Bot name
     *
     * @var string
     */
    protected $bot_name = '';

    /**
     * Raw request data (json) for webhook methods
     *
     * @var string
     */
    protected $input;

    /**
     * Custom commands paths
     *
     * @var array
     */
    protected $commands_paths = [];

    /**
     * @var
     */
    protected $update;

    /**
     * Upload path
     *
     * @var string
     */
    protected $upload_path;

    /**
     * Download path
     *
     * @var string
     */
    protected $download_path;

    /**
     * MySQL integration
     *
     * @var boolean
     */
    protected $mysql_enabled = false;

    /**
     * PDO object
     *
     * @var \PDO
     */
    protected $pdo;

    /**
     * Commands config
     *
     * @var array
     */
    protected $commands_config = [];

    /**
     * Admins list
     *
     * @var array
     */
    protected $admins_list = [];

    /**
     *  ServerResponse of the last Command execution
     * @var
     */
    protected $last_command_response;

    /**
     * Botan.io integration
     *
     * @var boolean
     */
    protected $botan_enabled = false;


    public $platform;


    public $debug = true;


    /**
     * Constructor
     *
     * @param string $api_key
     * @param string $bot_name
     */
    public function __construct($client)
    {
        $this->client = $client;

        switch ($client) {

            case 'telegram':

                Request::initializeTelegram($this);

                break;

            case 'facebook':
                Request::initializeFacebook($this);

                break;


            case 'viber':
                Request::initializeViber($this);

                break;
            case 'vk':

                Request::initializeVk($this);
                break;
        }



    }

    /**
     * Initialize Database connection
     *
     * @param array $credential
     * @param string $table_prefix
     *
     * @return This
     */
    public function enableMySql(array $credential, $table_prefix = null, $encoding = 'utf8mb4')
    {
        $this->pdo = DB::initialize($credential, new Bot(getenv("BOT_TOKEN_TELEGRAM"), getenv("BOT_NAME")), $table_prefix, $encoding);
        ConversationDB::initializeConversation();
        $this->mysql_enabled = true;
        return $this;
    }

    /**
     * Initialize Database external connection
     *
     * @param /PDO    $external_pdo_connection PDO database object
     * @param string $table_prefix
     */
    public function enableExternalMysql($external_pdo_connection, $table_prefix = null)
    {
        $this->pdo = DB::externalInitialize($external_pdo_connection, new Telegram(getenv("BOT_TOKEN_TELEGRAM"), getenv("BOT_NAME")), $table_prefix);
        ConversationDB::initializeConversation();
        $this->mysql_enabled = true;
    }

    /**
     * Get commands list
     *
     * @return array $commands
     */
    public function getCommandsList()
    {

       //   \Yii::info("    Получаем список команд", 'chat');
       // \Yii::info("    commands ARRAY ".print_r($this->commands_paths,true), 'chat');

        $commands = [];

        foreach ($this->commands_paths as $path) {
            try {
                //Get all "*Command.php" files
                $files = new \RegexIterator(
                    new \RecursiveIteratorIterator(
                        new \RecursiveDirectoryIterator($path)
                    ),
                    '/^.+Command.php$/'
                );

                foreach ($files as $file) {
                    //Remove "Command.php" from filename
                    // \Yii::info(print_r($file,true), 'infostudiobot');

                    $command = $this->sanitizeCommand(substr($file->getFilename(), 0, -11));
                    $command_name = strtolower($command);

                    if (array_key_exists($command_name, $commands)) {
                        continue;
                    }
                    require_once $file->getPathname();
                    $command_obj = $this->getCommandObject($command);
                    if ($command_obj instanceof Command) {
                        $commands[$command_name] = $command_obj;
                    }
                }
            } catch (\Exception $e) {
                throw new Exception('Error getting commands from path: ' . $path);
            }
        }


         //   \Yii::info("    commands ARRAY ".print_r($commands,true), 'chat');


        return $commands;
    }


    /**
     * Get the ServerResponse of the last Command execution
     *
     * @return
     */
    public function getLastCommandResponse()
    {
        return $this->last_command_response;
    }

    /**
     * @param null $limit
     * @param null $timeout
     * @return
     */
    public function handleGetUpdates($limit = null, $timeout = null)
    {
        if (!DB::isDbConnected()) {
            return new ServerResponse([
                'ok' => false,
                'description' => 'getUpdates needs MySQL connection!',
            ], $this->bot_name);
        }

        //DB Query
        $last_update = DB::selectTelegramUpdate(1);

        //As explained in the telegram bot api documentation
        $offset = (isset($last_update[0]['id'])) ? $last_update[0]['id'] + 1 : null;

        $response = Request::getUpdates([
            'offset' => $offset,
            'limit' => $limit,
            'timeout' => $timeout,
        ]);

        if ($response->isOk()) {
            //Process all updates
            foreach ((array)$response->getResult() as $result) {
                $this->processUpdate($result);
            }
        }

        return $response;
    }

    /**
     * Handle bot request from webhook
     *
     * @return bool
     */
    public function handle($bot_name)
    {
         \Yii::info("handle Start ... ", 'chat');



        $this->bot_name = $bot_name;
        $this->input = Request::getInput();

        if (empty($this->input)) {
            throw new  Exception('Input is empty!');
        }
        $post = json_decode($this->input, true);
        if (empty($post)) {
            throw new  Exception('Invalid JSON!');
        }


        $update = new Update($post, $bot_name, $this->client);


        //  \Yii::info(print_r($this,true), 'chat');
        // \Yii::info(print_r($this->input,true), 'chat');


        \Yii::info("handle processUpdate Start ... " . $this->bot_name, 'chat');
        return $this->processUpdate($update)->isOk();
    }


    private function getCommandFromType($type)
    {
        return $this->ucfirstUnicode(str_replace('_', '', $type));
    }

    /**
     * @param Update $update
     * @return mixed
     */
//    public function processUpdate(Update $update)
//    {
//        //  \Yii::info("processUpdate Ввовд: ".print_r($update->getMessage(),true), 'chat');
//
//        $this->update = $update;
//
//        //   \Yii::info("processUpdate  " . print_r($this,true), 'visuralbot');
//
//        $commands_path = \Yii::getAlias('@common/modules/bot/commands');
//        $commands_user_path = \Yii::getAlias('@backend/modules/bot/commands');
//
//
//        //If all else fails, it's a generic message.
//        $command = 'genericmessage';
//
//        $update_type = $this->update->getUpdateType();
//
//        \Yii::info("processUpdate  update_type-" . print_r($update_type, true), 'visuralbot');
//
//
//        if (in_array($update_type,
//            ['inline_query', 'chosen_inline_result', 'callback_query', 'edited_message']
//        )) {
//
//
//            if ($update_type != 'callback_query') {
//                $command = $this->getCommandFromType($update_type);
//            } else {
//                $data = $this->update->getCallbackQuery()->getData();
//
//
//                $command = $this->getCommandFromType($data);
//            }
//
//
//            \Yii::info("getCommandFromType Команда-" . print_r($command, true), 'chat');
//
//
//        } elseif ($update_type === 'message') {
//
//            $message = $this->update->getMessage();
//
//            // \Yii::info("getCommandFromType Команда: " . print_r($message, true), 'chat');
//
//
//            $this->addCommandsPath($commands_user_path . '/SystemCommands', false);
//            $this->addCommandsPath($commands_user_path . '/UserCommands', false);
//
//
//            $type = $message->getType();
//
//            if ($type === 'command') {
//                $command = $message->getCommand();
//                \Yii::info("getCommand Команда-" . print_r($command, true), 'chat');
//            }
//        }
//
//        //Make sure we have an up-to-date command list
//        //This is necessary to "require" all the necessary command files!
//
//
//
//
//        $this->getCommandsList();
//
//        DB::insertRequest($update);
//
//
//        return $this->executeCommand($command);
//    }



    public function processUpdate(Update $update)
    {
       //   \Yii::info("processUpdate Ввовд: ".print_r($update,true), 'chat');
          \Yii::info("this->client: ".print_r($this->client,true), 'chat');



        $this->update = $update;
        //   \Yii::info("processUpdate  " . print_r($this,true), 'visuralbot');
        $command = '';

        if ($this->client == 'telegram') {

            //If all else fails, it's a generic message.
            $command = 'genericmessage';
            $update_type = $this->update->getUpdateType();
            \Yii::info("processUpdate  update_type-" . print_r($update_type, true), 'visuralbot');
            if (in_array($update_type,
                ['inline_query', 'chosen_inline_result', 'callback_query', 'edited_message']
            )) {

                if ($update_type != 'callback_query') {
                    $command = $this->getCommandFromType($update_type);
                } else {
                    $data = $this->update->getCallbackQuery()->getData();
                    $command = $this->getCommandFromType($data);
                }
                \Yii::info("getCommandFromType Команда-" . print_r($command, true), 'chat');
            } elseif ($update_type === 'message') {
                $message = $this->update->getMessage();

                $type = $message->getType();
                if ($type === 'command') {
                    $command = $message->getCommand();
                    \Yii::info("getCommand Команда-" . print_r($command, true), 'chat');
                }
            }
        }
        if ($this->client == 'vk') {

            $dataVk = json_decode($this->input);
            \Yii::info("actionVk bot\r\n".print_r($dataVk,true), 'chat');

            if (isset($dataVk->object->payload)) {
                $payload = json_decode($dataVk->object->payload, true);
            }
            if(isset($payload)){
                $command = isset($payload['button'])?$payload['button']:"genericmessage";
            }else{
                //\Yii::info(" BOT dataVk \r\n".print_r($dataVk ,true), 'chat');

                if (isset($dataVk->type) && ($dataVk->type == 'confirmation'))
                {
                    $settings = BotSettings::find()->where(['group_id'=>trim(env("GROUP_VK"))])->one();
                    \Yii::info("settings \r\n".print_r($settings->key,true), 'chat');

                    if($settings){
                        echo $settings->reqest;
                        die;
                    }
                }
                $command = (isset($dataVk->object) && isset($dataVk->object->text))?$dataVk->object->text:"";
            }
        }


        \Yii::info("this->client   = " . $this->client, 'chat');



        if ($this->client == 'whatsapp') {



            $input = json_decode($this->input,true);

//            \Yii::info("parse_str   result = " . print_r($input,true), 'chat');
//



            if (isset($input['messages'][0]['body']) ) {

                if(mb_strtolower($input['messages'][0]['body'])=='старт'){
                    $command = 'Start';
                    \Yii::info("Ccommand  = " . print_r(mb_strtolower($input['messages'][0]['body']),true), 'chat');
                }




            }

        }

        if ($this->client == 'facebook') {

            $data = json_decode($this->input,true);
            if (isset($data['entry'][0]['messaging'][0]['message']['attachments'])) {
                \Yii::$app->end();
            }

            if (isset($data['entry'][0]['messaging'][0]['postback']['payload'])) {
                $payload = $data['entry'][0]['messaging'][0]['postback']['payload'];
            }
            if(isset($payload)){
                $command = $payload;
            }elseif(isset($data['entry'][0]['messaging'][0]['message']['text'])){
                $command = $data['entry'][0]['messaging'][0]['message']['text'];
            }
            else{



                \Yii::$app->end();
            }



        }


        if ($this->client == 'viber') {
            $inputViber = json_decode(file_get_contents('php://input'));
            if ($inputViber->event == 'seen' || $inputViber->event == 'delivered'|| $inputViber->event == 'webhook' || $inputViber->event =='conversation_started') {
                \Yii::info(" VIBER   seen delivered webhook conversation_started", 'infostudiobot');
                return Request::emptyResponse();
            }

            if(isset($inputViber->message) && isset($inputViber->message->text)){
                $command = $inputViber->message->text;
            }


        }

        //Make sure we have an up-to-date command list
        //This is necessary to "require" all the necessary command files!
        $this->getCommandsList();
        DB::insertRequest($update);
        return $this->executeCommand($command);
    }

    /**
     * Execute /command
     *
     * @param string $command
     *
     * @return mixed
     */
    public function executeCommand($command,$start = 'whatsapp_start')
    {


        \Yii::info("executeCommand ".$command, 'chat');
        if ($this->client == 'telegram') {
            /**
             * Сверяем пришедший текст с названиями команд
             * если нашли создаем обьект
             */
            $command_obj = $this->getCommandObject($command);
            // \Yii::info("executeCommand command_obj ".print_r($command_obj,true), 'chat');
            /**
             * Если нет обьекта т е нет такого файла и обьект не создан
             * запускаем команду по умолчанию
             */
            if (!$command_obj) {   //|| !$command_obj->isEnabled()
                $tmp = json_decode($this->input);
                if (isset($tmp->callback_query->data)) {
                    \Yii::info("|||||||||||||||||||||||| !command_obj  " . print_r($tmp->callback_query->data, true), 'chat');
                    if (strstr($tmp->callback_query->data, "payment")) {
                        $this->last_command_response = $this->executeCommand('payment');
                    }  else {
                        //Handle a generic command or non existing one
                        $this->last_command_response = $this->executeCommand('Genericmessage');
                    }
                }else{
                    $this->last_command_response = $this->executeCommand('Help');
                }
            } else {
                $this->last_command_response = $command_obj->preExecute();
            }
        }

        if ($this->client == 'vk') {
            /**
             * Сверяем пришедший текст с названиями команд
             * если нашли создаем обьект
             */
            $command_obj = $this->getCommandObject($command);
            // \Yii::info("executeCommand command_obj ".print_r($command_obj,true), 'chat');
            /**
             * Если нет обьекта т е нет такого файла и обьект не создан
             * запускаем команду по умолчанию
             */
            if (!$command_obj ) {   //|| !$command_obj->isEnabled()
                //Handle a generic command or non existing one
                // $this->last_command_response = $this->executeCommand('Genericmessage');
                $tmp = json_decode($this->input);
                if (isset($tmp->object->payload))
                {
                    $payload = json_decode($tmp->object->payload,true);
                    if (isset($payload)) {
                        $text = isset($payload['button']) ? $payload['button'] : '';
                    } else {
                        $text = $tmp->object->text;
                    }
                } else {
                    if (isset($tmp->object->text)) {
                        $text = $tmp->object->text;
                    } else {
                        $text = "Start";
                    }

                }
                \Yii::info("vk Подмена  ".print_r($text, true), 'chat');

               // if (strstr($text, "test")) {
                  //  $this->last_command_response = $this->executeCommand('test');
               // }else {
                    $this->last_command_response = $this->executeCommand('Genericmessage');
               // }
            } else {
                $this->last_command_response = $command_obj->preExecute();
            }
        }



        if ($this->client == 'viber') {


            /**
             * Сверяем пришедший текст с названиями команд
             * если нашли создаем обьект
             */
            $command_obj = $this->getCommandObject($command);
            // \Yii::info("executeCommand command_obj ".print_r($command_obj,true), 'infostudiobot');
            /**
             * Если нет обьекта т е нет такого файла и обьект не создан
             * запускаем команду по умолчанию
             */
            if (!$command_obj ) {   //|| !$command_obj->isEnabled()
                //Handle a generic command or non existing one
                // $this->last_command_response = $this->executeCommand('Genericmessage');
                $inputViber = json_decode($this->input);

                if (isset($inputViber->message->text)){
                    $text = $inputViber->message->text;
                }

                \Yii::info("vk Подмена  ".print_r($text, true), 'chat');


                if (strstr($text, "dialogs")) {
                    $this->last_command_response = $this->executeCommand('dialogs');
                }elseif (strstr($text, "read")) {
                    $this->last_command_response = $this->executeCommand('read');
                }else {
                    $this->last_command_response = $this->executeCommand('Genericmessage');
                }




            } else {
                $this->last_command_response = $command_obj->preExecute();
            }


        }

        if ($this->client == 'whatsapp') {






            /**
             * Сверяем пришедший текст с названиями команд
             * если нашли создаем обьект
             */
            $command_obj = $this->getCommandObject($command);
            // \Yii::info("executeCommand command_obj ".print_r($command_obj,true), 'infostudiobot');
            /**
             * Если нет обьекта т е нет такого файла и обьект не создан
             * запускаем команду по умолчанию
             */
            if (!$command_obj ) {   //|| !$command_obj->isEnabled()
                //Handle a generic command or non existing one
                // $this->last_command_response = $this->executeCommand('Genericmessage');



                parse_str(file_get_contents('php://input'),$result);
                $text='';
                if (isset($result['message']['body']['text']) ) {
                    $text = $result['message']['body']['text'];
                    \Yii::info(" whatsapp Подмена  ".print_r($text, true), 'infostudiobot');
                }






                if (strstr($text, "modelpay")) {
                    $this->last_command_response = $this->executeCommand('pay');
                }else {
                    $this->last_command_response = $this->executeCommand('Genericmessage');
                }
            } else {
                $command_obj->key = $start;
                $this->last_command_response = $command_obj->preExecute();
            }
        }

        if ($this->client == 'facebook') {
            /**
             * Сверяем пришедший текст с названиями команд
             * если нашли создаем обьект
             */
            $command_obj = $this->getCommandObject($command);
            // \Yii::info("executeCommand command_obj ".print_r($command_obj,true), 'infostudiobot');
            /**
             * Если нет обьекта т е нет такого файла и обьект не создан
             * запускаем команду по умолчанию
             */
            if (!$command_obj ) {   //|| !$command_obj->isEnabled()
                //Handle a generic command or non existing one
                // $this->last_command_response = $this->executeCommand('Genericmessage');
                $data = json_decode($this->input,true);

                if (isset($data['entry'][0]['messaging'][0]['postback']['payload'])) {
                    $payload = $data['entry'][0]['messaging'][0]['postback']['payload'];
                }
                if(isset($payload)){
                    $text = $payload;
                }else{
                    if (isset($data['entry'][0]['messaging'][0]['message']['text'])) {
                        $text = $data['entry'][0]['messaging'][0]['message']['text'];
                        \Yii::info("fb Подмена  ".print_r($text, true), 'infostudiobot');
                    } else {
                        $text = '';
                    }

                }



                if (strstr($text, "like")) {
                    $this->last_command_response = $this->executeCommand('like');
                }elseif (strstr($text, "read")) {
                    $this->last_command_response = $this->executeCommand('read');
                } {
                    $this->last_command_response = $this->executeCommand('Genericmessage');
                }
            } else {
                $this->last_command_response = $command_obj->preExecute();
            }
        }

        // \Yii::info("last_command_response " . print_r($this->last_command_response, true), 'chat');

        return $this->last_command_response;
    }


    protected function sanitizeCommand($command)
    {
        return str_replace(' ', '', $this->ucwordsUnicode(str_replace('_', ' ', $command)));
    }

    /**
     * Enable a single Admin account
     *
     * @param integer $admin_id Single admin id
     *
     * @return Telegram
     */
    public function enableAdmin($admin_id)
    {


        if (is_int($admin_id) && $admin_id > 0 && !in_array($admin_id, $this->admins_list)) {
            $this->admins_list[] = $admin_id;


        } else {
            \Yii::info('Invalid value "' . $admin_id . '" for admin.', 'chat');


        }


        return $this;
    }

    /**
     * Enable a list of Admin Accounts
     *
     * @param array $admin_ids List of admin ids
     *
     * @return Telegram
     */
    public function enableAdmins(array $admin_ids)
    {
        foreach ($admin_ids as $admin_id) {
            $this->enableAdmin((int)$admin_id);
        }

        return $this;
    }

    /**
     * Get list of admins
     *
     * @return array
     */
    public function getAdminList()
    {
        return $this->admins_list;
    }


    /**
     * Check if the passed user is an admin
     *
     * If no user id is passed, the current update is checked for a valid message sender.
     *
     * @param int|null $user_id
     *
     * @return bool
     */
    public function isAdmin($user_id = null)
    {
        if ($user_id === null && $this->update !== null) {
            if (($message = $this->update->getMessage()) && ($from = $message->getFrom())) {
                $user_id = $from->getId();
            } elseif (($inline_query = $this->update->getInlineQuery()) && ($from = $inline_query->getFrom())) {
                $user_id = $from->getId();
            } elseif (($chosen_inline_result = $this->update->getChosenInlineResult()) && ($from = $chosen_inline_result->getFrom())) {
                $user_id = $from->getId();
            } elseif (($callback_query = $this->update->getCallbackQuery()) && ($from = $callback_query->getFrom())) {
                $user_id = $from->getId();
            } elseif (($edited_message = $this->update->getEditedMessage()) && ($from = $edited_message->getFrom())) {
                $user_id = $from->getId();
            }
        }

        return ($user_id === null) ? false : in_array($user_id, $this->admins_list);
    }

    /**
     * Check if user required the db connection
     *
     * @return bool
     */
    public function isDbEnabled()
    {
        if ($this->mysql_enabled) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Add a single custom commands path
     *
     * @param string $path Custom commands path to add
     * @param bool $before If the path should be prepended or appended to the list
     *
     * @return Telegram
     */
    public function addCommandsPath($path, $before = true)
    {
        if (!is_dir($path)) {

            \Yii::info('Commands path "' . $path . '" does not exist.', 'chat');
        } elseif (!in_array($path, $this->commands_paths)) {
            if ($before) {
                array_unshift($this->commands_paths, $path);
            } else {
                array_push($this->commands_paths, $path);
            }
        }

        return $this;
    }

    /**
     * Add multiple custom commands paths
     *
     * @param array $paths Custom commands paths to add
     * @param bool $before If the paths should be prepended or appended to the list
     *
     * @return Telegram
     */
    public function addCommandsPaths(array $paths, $before = true)
    {
        foreach ($paths as $path) {
            $this->addCommandsPath($path);
        }

        return $this;
    }


    /**
     * Set command config
     *
     * Provide further variables to a particular commands.
     * For example you can add the channel name at the command /sendtochannel
     * Or you can add the api key for external service.
     *
     * @param string $command
     * @param array $config
     *
     * @return \Longman\TelegramBot\Telegram
     */
    public function setCommandConfig($command, array $config)
    {
        $this->commands_config[$command] = $config;
        return $this;
    }

    /**
     * Get command config
     *
     * @param string $command
     *
     * @return array
     */
    public function getCommandConfig($command)
    {
        return isset($this->commands_config[$command]) ? $this->commands_config[$command] : [];
    }

    /**
     * Get API key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * Get Bot name
     *
     * @return string
     */
    public function getBotName()
    {
        return $this->bot_name;
    }

    /**
     * Get Version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }


    public function setWebHook($url, $path_certificate = null)
    {
        if (empty($url)) {
            throw new Exception('Hook url is empty!');
        }

        $result = Request::setWebhook($url, $path_certificate);

        if (!$result->isOk()) {
            throw new Exception(
                'Webhook was not set! Error: ' . $result->getErrorCode() . ' ' . $result->getDescription()
            );
        }

        return $result;
    }


    public function unsetWebHook()
    {
        $result = Request::setWebhook();

        if (!$result->isOk()) {
            throw new Exception(
                'Webhook was not unset! Error: ' . $result->getErrorCode() . ' ' . $result->getDescription()
            );
        }

        return $result;
    }


    protected function ucwordsUnicode($str, $encoding = 'UTF-8')
    {
        return mb_convert_case($str, MB_CASE_TITLE, $encoding);
    }


    protected function ucfirstUnicode($str, $encoding = 'UTF-8')
    {
        return mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding) . mb_strtolower(mb_substr($str, 1, mb_strlen($str), $encoding), $encoding);
    }


    public function getCommandObject($command)
    {
        $which = ['System'];
       // ($this->isAdmin()) && $which[] = 'Admin';
       // $which[] = 'User';

        foreach ($which as $auth) {
            $command_namespace = __NAMESPACE__ . '\\commands\\' . $auth . 'Commands\\' . $this->ucfirstUnicode($command) . 'Command';
            if (class_exists($command_namespace)) {
            //      \Yii::info("Найден класс иницилизирую  ".$this->ucfirstUnicode($command), 'chat');
               //   \Yii::info("command_namespace  ".$command_namespace, 'chat');

                $obj = new $command_namespace($this, $this->update);

               //  \Yii::info(print_r($obj,true), 'infostudiobot');

                return $obj;
            } else {
                \Yii::info(" NO   class_exists {$command_namespace}", 'chat');

            }
        }

        return null;
    }


}

