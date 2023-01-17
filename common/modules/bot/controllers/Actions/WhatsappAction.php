<?php
/**
 * t.me/SemoshiBot
 * https://api.telegram.org/bot476331817:AAG1kaNjlTeViWbY3VyzZ8GT9oMf4_aI2Rs/setWebhook?url=https://bot.semoshi.ru/
 */

namespace common\modules\bot\controllers\Actions;


use backend\modules\benbot\components\Benbot;


use backend\modules\benbot\components\Bot;
use backend\modules\benbot\components\telegram\Telegram;
use backend\modules\benbot\models\Buttons;
use common\components\telegrambot\src\TelegramLog;
use common\models\BenClients;

use common\modules\bot\Exception;
use common\modules\bot\LogException;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


use onmotion\telegram\TelegramAsset;
use TelegramBot\Api\Client;
use yii\base\Action;
use Yii;
use yii\helpers\VarDumper;


class WhatsappAction extends Action
{

    public function run()
    {
        $input = file_get_contents('php://input');

         parse_str($input,$result);

        \Yii::info("INPUT >>>>>>>>>>>>".print_r($result,true), 'chat');



        try {
            \Yii::info(print_r(json_decode(Yii::$app->request->getRawBody()), true), 'chat');
            \Yii::info(print_r( Yii::$app->request->getRawBody(), true), 'chat');

            $bot = new \common\modules\bot\Bot('whatsapp');
            $BOT_NAME =getenv('APP_NAME');
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

        } catch ( Exception $e) {


            \Yii::info(print_r($e->getMessage(), true), 'chat');

        } catch ( LogException $e) {

            // Silence is gold! Uncomment this to catch log initilization errors
            \Yii::info(print_r($e->getMessage(), true), 'chat');

        }

        \Yii::info("whatsapp End bot  \r\n", 'chat');










    }
}