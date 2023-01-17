<?php
/**
 * t.me/SemoshiBot
 * https://api.telegram.org/bot476331817:AAG1kaNjlTeViWbY3VyzZ8GT9oMf4_aI2Rs/setWebhook?url=https://bot.semoshi.ru/
 */

namespace common\modules\bot\controllers\Actions;



use yii\base\Action;
use Yii;
use yii\helpers\VarDumper;


class ViberAction extends Action
{

    public function run()
    {
        

        \Yii::info(print_r(json_decode(Yii::$app->request->getRawBody()), true), 'chat');
        \Yii::info(print_r( Yii::$app->request->getRawBody(), true), 'chat');
        $BOT_NAME = getenv('APP_NAME');
        try {
            \Yii::info(print_r(json_decode(Yii::$app->request->getRawBody()), true), 'chat');
            \Yii::info(print_r(Yii::$app->request->getRawBody(), true), 'chat');
            $bot = new \common\modules\bot\Bot('viber');
            $BOT_NAME = getenv('APP_NAME');
            $mysql_credentials = [
                'host' => 'astrobot_db',
                'user' => getenv('DB_USERNAME'),
                'password' => getenv('DB_PASSWORD'),
                'database' => getenv('MYSQL_DATABASE'),
            ];
            $bot->enableMySQL($mysql_credentials);
            $commands_path = \Yii::getAlias('@common/modules/bot/commands/');
            $bot->addCommandsPath($commands_path . 'SystemCommands');
            $bot->addCommandsPath($commands_path . 'UserCommands');
            \Yii::info("вызов InfomarketstudioBot handle", 'chat');
            $bot->handle($BOT_NAME);
        } catch (\common\modules\bot\Exception $e) {
            \Yii::info(print_r($e->getMessage(), true), 'chat');
        } catch (\common\modules\bot\LogException $e) {
            // Silence is gold! Uncomment this to catch log initilization errors
            \Yii::info(print_r($e->getMessage(), true), 'chat');
        }
        \Yii::info( " ok viber bot " . date("d.m.Y H:s:i"), 'chat');
//        echo " ok viber bot " . date("d.m.Y H:s:i") . "<pre>";



    }
}