<?php

namespace common\modules\admin\commands;

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
    public $interactive = true;

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
        $module = Yii::$app->controller->module;
        $version = $module->version;
        $welcome =
            '╔════════════════════════════════════════════════╗'. "\n" .
            '║                                                ║'. "\n" .
            '║             ADMIN MODULE, v.'.$version.'             ║'. "\n" .
            '║          by Alexsander Vyshnyvetskyy           ║'. "\n" .
            '║       (c) 2019-2021 W.D.M.Group, Ukraine       ║'. "\n" .
            '║                                                ║'. "\n" .
            '╚════════════════════════════════════════════════╝';
        echo $name = $this->ansiFormat($welcome . "\n\n", Console::FG_GREEN);
        echo "Select the operation you want to perform:\n";
        echo "  1) Apply all migrations for itlo.cms\n";
        echo "  2) Revert all modules migrations\n\n";
        echo "Your choice: ";

        if(!is_null($this->choice))
            $selected = $this->choice;
        else
            $selected = trim(fgets(STDIN));

        if ($selected == "1") {

            Yii::$app->runAction('migrate/up', ['migrationPath' => '@common/modules/admin/migrations', 'interactive' => $this->interactive]);

            if ((!$this->interactive == 0) || (!$this->interactive)) {
                Yii::$app->runAction('users/init', ['choice' => 1, 'interactive' => true]);
                Yii::$app->runAction('users/init', ['choice' => 3, 'interactive' => true]);
                Yii::$app->runAction('rbac/init', ['choice' => 1, 'interactive' => true]);
                Yii::$app->runAction('rbac/init', ['choice' => 2, 'interactive' => true]);
                Yii::$app->runAction('options/init', ['choice' => 1, 'interactive' => true]);
                Yii::$app->runAction('options/init', ['choice' => 3, 'interactive' => true]);
            }




        } else if($selected == "2") {
            Yii::$app->runAction('options/init', ['choice' => 2, 'interactive' => true]);
            Yii::$app->runAction('system/init', ['choice' => 2, 'interactive' => true]);
            Yii::$app->runAction('rbac/init', ['choice' => 3, 'interactive' => true]);
            Yii::$app->runAction('users/init', ['choice' => 2, 'interactive' => true]);
            Yii::$app->runAction('migrate/down', ['migrationPath' => 'common/modules/rbac/migrations', 'interactive' => $this->interactive]);

        } else {
            echo $this->ansiFormat("Error! Your selection has not been recognized.\n\n", Console::FG_RED);
            return ExitCode::UNSPECIFIED_ERROR;
        }

        echo "\n";
        return ExitCode::OK;
    }
}
