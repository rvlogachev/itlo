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


use common\modules\bot\components\Helper;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use onmotion\telegram\TelegramAsset;
use TelegramBot\Api\Client;
use yii\base\Action;
use Yii;
use yii\helpers\VarDumper;

class FacebookAction extends Action {

    public function run() {


        $BOT_NAME = getenv('APP_NAME');

        try {
            // \Yii::info("getHeaders ".print_r( Yii::$app->request->getHeaders(), true), 'chat');
            \Yii::info(print_r(json_decode(Yii::$app->request->getRawBody()), true), 'chat');

            \Yii::info(print_r(Yii::$app->request->getRawBody(), true), 'chat');
            //  \Yii::info(print_r("getUrl ".Yii::$app->request->getUrl(), true), 'chat');

            \Yii::info('FAcebook Action' , 'chat');






           # $VERIFY_TOKEN = "5uaxuIbKvl3aJPLQCAWMhqiWQfxXWJ9O";
            $VERIFY_TOKEN = "05b9dd50e74e2843ff7064677db91980";

            $mode = '';
            $token = '';
            $challenge = '';
            if (isset($_GET['hub_mode']))
                $mode = $_GET['hub_mode'];
            if (isset($_GET['hub_verify_token']))
                $token = $_GET['hub_verify_token'];
            if (isset($_GET['hub_challenge']))
                $challenge = $_GET['hub_challenge'];

            //  \Yii::info(" mode {$mode} token  {$token} challenge  {$challenge}", 'chat');
            // Checks if a token and mode is in the query string of the request
            if ($mode && $token) {
                // Checks the mode and token sent is correct
                if ($mode === 'subscribe' && $token === $VERIFY_TOKEN) {
                    echo $challenge;
                    Yii::$app->end();
                } else {
                    // Responds with '403 Forbidden' if verify tokens do not match
                    echo "verify tokens do not match";
                    Yii::$app->end();
                }
            }

            $object = json_decode(Yii::$app->request->getRawBody());

            if ($object->object  == 'page' && isset($object->entry[0]->changes[0])  ) {

                $leadnew = $object->entry[0]->changes[0]->value;
                if (isset($leadnew)) {
                    \Yii::info("  lead fb leadgen_id ".print_r( $leadnew->leadgen_id,true), 'chat');
                    \Yii::info("  lead fb form_id  ".print_r( $leadnew->form_id,true), 'chat');
                    \Yii::info("  lead fb page_id  ".print_r( $leadnew->page_id,true), 'chat');

                    $lead = Helper::getFbLead($leadnew->leadgen_id);

                    \Yii::info("  lead ".print_r( $lead ,true), 'chat');

                }


            }



            $bot = new \common\modules\bot\Bot('facebook');



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

        \Yii::info(" ok facebook bot " . date("d.m.Y H:s:i"), 'chat');
       // echo " ok facebook bot " . date("d.m.Y H:s:i") . "<pre>";
    }

}
