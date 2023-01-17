<?php
/**
 * t.me/SemoshiBot
 * https://api.telegram.org/bot476331817:AAG1kaNjlTeViWbY3VyzZ8GT9oMf4_aI2Rs/setWebhook?url=https://bot.semoshi.ru/
 */
namespace common\modules\bot\controllers\Actions;




use  common\modules\bot\Bot;
use  common\modules\bot\components\telegram\Telegram;

use yii\base\Action;
use Yii;
use yii\helpers\VarDumper;




class TelegramAction extends Action
{

    public function run()
    {


        \Yii::info(print_r('sdfsdfsdfsdfsdf',true), 'chat');
        \Yii::info(print_r('sdfsdfsdfsdfsdf',true), 'debug');


        \Yii::info(print_r(Yii::$app->request->getRawBody(),true), 'chat');


        $BOT_NAME =getenv('APP_NAME');

        $mysql_credentials = [

            'host' => 'astrobot_db',
            'user' => 'root',
            'password' => 'root',
            'database' => 'astrobot',

        ];




        try {
            // Create Telegram API object
            $bot = new \common\modules\bot\Bot('telegram');




            //// Enable MySQL
            $bot->enableMySQL($mysql_credentials);





            $commands_path = \Yii::getAlias('@common/modules/bot/commands/');
            // \Yii::info("getCommandFromType Команда: " . print_r($message, true), 'chat');
            //Load admin commands

            $bot->addCommandsPath($commands_path . 'SystemCommands');
            $bot->addCommandsPath($commands_path . 'UserCommands');

            //// Here you can enable admin interface for the channel you want to manage
            $bot->enableAdmins(['201378424']);

            $bot->setCommandConfig('sendtochannel', ['Инфомаркет' => '@chatbotbusiness']);

            //// Here you can set some command specific parameters,
            //// for example, google geocode/timezone api key for date command:
            //$telegram->setCommandConfig('date', ['google_api_key' => 'your_google_api_key_here']);



            \Yii::info("вызов InfomarketstudioBot handle", 'chat');
            $bot->handle($BOT_NAME);

        } catch (\common\modules\bot\Exception $e) {


            \Yii::info(print_r($e->getMessage(), true), 'chat');

        } catch (\common\modules\bot\LogException $e) {
            // Silence is gold! Uncomment this to catch log initilization errors
            \Yii::info(print_r($e->getMessage(), true), 'chat');
        }



        \Yii::info( " ok telegram bot " . date("d.m.Y H:s:i"), 'chat');
        //echo " ok telegram bot " . date("d.m.Y H:s:i") . "<pre>";


    }
}