<?php

namespace common\modules\users\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class InitController extends Controller
{
    /**
     * @inheritdoc
     */
    public $choice = null;

    /**
     * @inheritdoc
     */
    public $defaultAction = 'index';

    public function options($actionID)
    {
        return ['choice', 'color', 'interactive', 'help'];
    }

    public function actionIndex($params = null)
    {
        $version = Yii::$app->controller->module->version;
        $welcome =
            '╔════════════════════════════════════════════════╗'. "\n" .
            '║                                                ║'. "\n" .
            '║             USERS MODULE, v.'.$version.'              ║'. "\n" .
            '║              by Roman Logachev                 ║'. "\n" .
            '║       (c) 2020-2021 Infomarket, Moscow         ║'. "\n" .
            '║                                                ║'. "\n" .
            '╚════════════════════════════════════════════════╝';
        echo $name = $this->ansiFormat($welcome . "\n\n", Console::FG_GREEN);
        echo "Select the operation you want to perform:\n";
        echo "  1) Apply all module migrations\n";
        echo "  2) Revert all module migrations\n";
        echo "  3) Batch insert demo data\n\n";
        echo "Your choice: ";

        if(!is_null($this->choice))
            $selected = $this->choice;
        else
            $selected = trim(fgets(STDIN));

        if ($selected == "1") {
            Yii::$app->runAction('migrate/up', ['migrationPath' => 'common/modules/users/migrations', 'interactive' => true]);
        } else if($selected == "2") {
            Yii::$app->runAction('migrate/down', ['migrationPath' => 'common/modules/users/migrations', 'interactive' => true]);
        }  else if($selected == "3") {

            echo $this->ansiFormat("\n\n");

            $users = [
                'root',
                'admin',
                'user',
                'approved',
                'editor',
                'manager',
                'guest'
            ];

            $i = 0;
            foreach ($users as $user) {

                echo $this->ansiFormat("Insert user #".($i+1)."... ", Console::FG_YELLOW);

                $status = 10;
                if($i >= 1)
                    $status = 0;

                Yii::$app->db->createCommand()->insert('{{%users}}', [
                    'id' => (1+$i),
                    'username' => $user,
                    'auth_key' => Yii::$app->security->generateRandomString(),
                    'password_hash' => '$2y$13$j4ZarxjwBV.eC9q7pbg41OWLuR0Nu2.LLfOzD0rkLqnwkgBvCTIvy', //skeeks
                    'phone' => '8916487200'.$i, //skeeks
                    //Yii::$app->security->generatePasswordHash($user),
                    'password_reset_token' => null,
                    'email' => $user . '@example.com',
                    'status' => $status,
                    'created_at' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " -".($i*2)." days" . " -".($i*2)." hours")),
                    'updated_at' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " -".($i*2)." days" . " -".($i*2)." hours")),
                ])->execute();

                $i++;

                echo $this->ansiFormat("Done.\n", Console::FG_GREEN);
            }

            echo $this->ansiFormat("Data inserted successfully.\n\n", Console::FG_GREEN);

        } else {
            echo $this->ansiFormat("Error! Your selection has not been recognized.\n\n", Console::FG_RED);
            return ExitCode::UNSPECIFIED_ERROR;
        }

        echo "\n";
        return ExitCode::OK;
    }
}
