<?php
/**
 * t.me/SemoshiBot
 * https://api.telegram.org/bot476331817:AAG1kaNjlTeViWbY3VyzZ8GT9oMf4_aI2Rs/setWebhook?url=https://bot.semoshi.ru/
 */

namespace common\modules\bot\controllers\Actions;



use common\modules\bot\models\BotSettings;
use yii\base\Action;
use Yii;
use yii\helpers\VarDumper;


class VkAction extends Action
{


    public function run_old()
    {
        \Yii::$app->user->enableSession = false;
        \Yii::$app->user->enableAutoLogin = false;

        \Yii::info("Начало VkAction->run() \r\n", 'chat');


        if (!isset($_REQUEST)) {
            return;
        }

        //Строка для подтверждения адреса сервера из настроек Callback API
        $settings = BotSettings::find()->where(['group_id'=>trim(env("GROUP_VK"))])->one();
        if ($settings) {
            \Yii::info("Настройки группы установлены \r\n".print_r($settings->key.$settings->reqest,true), 'chat');
        } else {
            \Yii::info("Настройки группы не установлены. Необходимо обновить информацию о группе в настройках бота \r\n", 'chat');
            die;
        }


        if($settings){
            $confirmation_token =  $settings->reqest;

        }


        //Ключ доступа сообщества
        $token = env('BOT_TOKEN_VKONTAKTE');

        //Получаем и декодируем уведомление
        $data = json_decode(file_get_contents('php://input'));
        \Yii::info('Start data vk '.print_r($data,true),'chat');

        //Проверяем, что находится в поле "type"
        switch ($data->type) {
            //Если это уведомление для подтверждения адреса...
            case 'confirmation':
                //...отправляем строку для подтверждения
                echo $confirmation_token;
                break;

            //Если это уведомление о новом сообщении...
            case 'message_new':
                //...получаем id его автора
                $user_id = $data->object->user_id;
                //затем с помощью users.get получаем данные об авторе
                $user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&access_token={$token}&v=5.103"));
                \Yii::info('Start user_info vk '.print_r($user_info,true),'chat');

                //и извлекаем из ответа его имя
                $user_name = $user_info->response[0]->first_name;

                //С помощью messages.send отправляем ответное сообщение
                $request_params = array(
                    'message' => "Hello, {$user_name}!",
                    'peer_id' => $user_id,
                    'access_token' => $token,
                    'v' => '5.103',
                    'random_id' => '0'
                );

                $get_params = http_build_query($request_params);

                file_get_contents('https://api.vk.com/method/messages.send?' . $get_params);

                //Возвращаем "ok" серверу Callback API

                echo('ok');
                die;
        }
    }



    public function run()
    {


        \Yii::info('Start bot Vk ','chat');


        try {
            \Yii::info(print_r(json_decode(Yii::$app->request->getRawBody()), true), 'chat');
            \Yii::info(print_r( Yii::$app->request->getRawBody(), true), 'chat');


            $bot = new \common\modules\bot\Bot('vk');


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
           // $bot->addCommandsPath($commands_path . 'UserCommands');

            \Yii::info("вызов InfomarketstudioBot handle", 'chat');



            $bot->handle($BOT_NAME);



        } catch (\common\modules\bot\LogException $e) {

            // Silence is gold! Uncomment this to catch log initilization errors
            \Yii::info(print_r($e->getMessage(), true), 'chat');

        }

        \Yii::info( " ok vk bot " . date("d.m.Y H:s:i"), 'chat');
        echo "ok";
        die;



    }
}