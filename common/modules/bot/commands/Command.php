<?php


namespace common\modules\bot\commands;

use common\modules\bot\Bot;
use common\modules\bot\components\telegram\Telegram;
use common\modules\bot\DB;
use common\modules\bot\Request;
use common\modules\bot\Update;
use common\modules\bot\commands\AdminCommand;
use common\modules\bot\commands\SystemCommand;
use common\modules\bot\commands\UserCommand;


/**
 * Abstract Command Class
 */
abstract class Command
{
    /**
     * Telegram object
     *
     * @var platform
     */
    protected $platform;

    public  $key;
    /**
     * @var
     */
    protected $update;

    /**
     * Message object
     *
     * @var
     */
    protected $message;

    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Usage
     *
     * @var string
     */
    protected $usage = 'Command usage';

    /**
     * Version
     *
     * @var string
     */
    protected $version = '1.0.0';

    /**
     * If this command is enabled
     *
     * @var boolean
     */
    protected $enabled = true;

    /**
     * If this command needs mysql
     *
     * @var boolean
     */
    protected $need_mysql = false;

    /**
     * Command config
     *
     * @var array
     */
    protected $config = [];

    /**
     * Command constructor.
     * @param Bot $platform
     * @param Update|null $update
     */
    public function __construct(\common\modules\bot\Bot $bot, \common\modules\bot\Update $update = null)
    {
    //    \Yii::info("Запуск команды {$this->name}", 'chat');


        $this->platform = $bot;
        $this->setUpdate($update);
        $this->config = $bot->getCommandConfig($this->name);



      //  \Yii::info("Конструктор команды  {$this->name} ", 'chat');

    }


    public function setUpdate(\common\modules\bot\Update $update = null)
    {
        if (!empty($update)) {
            $this->update = $update;
            $this->message = $this->update->getMessage();
        }


        return $this;
    }


    public function preExecute()
    {

        \Yii::info("preExecute  ", 'chat');


//        if ($this->need_mysql && !($this->platform->isDbEnabled() && DB::isDbConnected())) {
//            return $this->executeNoDb();
//        }
        return $this->execute();
    }


    abstract public function execute();


    public function executeNoDb()
    {
        //Preparing message
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();

        $data = [
            'chat_id' => $chat_id,
            'text'    => 'Sorry no database connection, unable to execute "' . $this->name . '" command.',
        ];

        return \common\modules\bot\Request::sendMessage($data);
    }


    public function getUpdate()
    {
        return $this->update;
    }


    public function getMessage()
    {
        return $this->message;
    }

    public function getConfig($name = null)
    {
        if ($name === null) {
            return $this->config;
        }
        if (isset($this->config[$name])) {
            return $this->config[$name];
        }
        return null;
    }


    public function getTelegram()
    {
        return $this->telegram;
    }

    public function getUsage()
    {
        return $this->usage;
    }


    public function getVersion()
    {
        return $this->version;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function getName()
    {
        return $this->name;
    }


    public function isEnabled()
    {
        return $this->enabled;
    }


    public function isSystemCommand()
    {
        return ($this instanceof SystemCommand);
    }

    /**
     * If this is an AdminCommand
     *
     * @return bool
     */
    public function isAdminCommand()
    {
        return ($this instanceof AdminCommand);
    }

    /**
     * If this is a UserCommand
     *
     * @return bool
     */
    public function isUserCommand()
    {
        return ($this instanceof UserCommand);
    }
}
