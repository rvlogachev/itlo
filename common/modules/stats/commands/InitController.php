<?php

namespace common\modules\stats\commands;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

use yii\helpers\Console;
use yii\helpers\ArrayHelper;

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
        $module = Yii::$app->controller->module;
        $version = $module->version;
        $welcome =
            '╔════════════════════════════════════════════════╗'. "\n" .
            '║                                                ║'. "\n" .
            '║              STATS MODULE, v.'.$version.'             ║'. "\n" .
            '║           by Alexsander Vyshnyvetskyy          ║'. "\n" .
            '║       (c) 2019-2021 W.D.M.Group, Ukraine       ║'. "\n" .
            '║                                                ║'. "\n" .
            '╚════════════════════════════════════════════════╝';
        echo $name = $this->ansiFormat($welcome . "\n\n", Console::FG_GREEN);
        echo "Select the operation you want to perform:\n";
        echo "  1) Apply all module migrations\n";
        echo "  2) Revert all module migrations\n";
        echo "  3) Update MaxMind GeoLite2 database\n\n";
        echo "Your choice: ";

        if(!is_null($this->choice))
            $selected = $this->choice;
        else
            $selected = trim(fgets(STDIN));

        if ($selected == "1") {
            Yii::$app->runAction('migrate/up', ['migrationPath' => '@common/modules/stats/migrations', 'interactive' => true]);
        } else if($selected == "2") {
            Yii::$app->runAction('migrate/down', ['migrationPath' => '@common/modules/stats/migrations', 'interactive' => true]);
        } else if($selected == "3") {
            if ($result = $module->updateGeoIP())
                echo $this->ansiFormat("\n" ."OK! MaxMind GeoLite2 database updated successful." . "\n\n", Console::FG_YELLOW);
            elseif ($result === 0)
                echo $this->ansiFormat("\n" ."Error! You must configure the MaxMind GeoLite2 license key first." . "\n\n", yii\helpers\Console::FG_RED);
            else
                echo $this->ansiFormat("\n" ."An error occurred while updating MaxMind GeoLite2 database." . "\n\n", yii\helpers\Console::FG_RED);

        } else {
            echo $this->ansiFormat("Error! Your selection has not been recognized.\n\n", Console::FG_RED);
            return ExitCode::UNSPECIFIED_ERROR;
        }

        echo "\n";
        return ExitCode::OK;
    }
}
