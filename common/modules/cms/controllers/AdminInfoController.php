<?php

namespace common\modules\cms\controllers;

use common\modules\cms\modules\admin\controllers\AdminController;
use common\modules\backend\BackendAction;
use common\modules\backend\BackendController;
use common\modules\cms\helpers\UrlHelper;
use common\modules\cms\models\Search;
use common\modules\cms\modules\admin\actions\AdminAction;
use common\modules\cms\modules\sx\Dir;
use common\modules\cms\modules\sx\File;
use yii\data\ArrayDataProvider;
use yii\filters\VerbFilter;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

use Yii;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminInfoController extends BackendController
{

    public $layout = '@backend/themes/adminlte/views/layouts/common';

    public function init()
    {
        $this->name = \Yii::t('skeeks/cms', "Information about the system");
        $this->generateAccessActions = false;

        parent::init();
    }

    public function actions()
    {
        return
            [
                'index' =>
                    [
                        'class' => BackendAction::className(),
                        'name' => \Yii::t('skeeks/cms', 'General information'),
                        'callback' => [$this, 'actionIndex'],
                    ]
            ];
    }

    public function actionIndex()
    {
        return $this->render($this->action->id,
            [
                'phpVersion' => PHP_VERSION,
                'yiiVersion' => \Yii::getVersion(),
                'application' => [
                    'yii' => \Yii::getVersion(),
                    'name' => \Yii::$app->cms->appName,
                    'env' => YII_ENV,
                    'debug' => YII_DEBUG,
                ],
                'php' => [
                    'version' => PHP_VERSION,
                    'xdebug' => extension_loaded('xdebug'),
                    'apc' => extension_loaded('apc'),
                    'memcache' => extension_loaded('memcache'),
                    'xcache' => extension_loaded('xcache'),
                    'imagick' => extension_loaded('imagick'),
                    'gd' => extension_loaded('gd'),
                ],
                'extensions' => $this->getExtensions(),
            ]);
    }


    public function actionPhp()
    {
        phpinfo();
        die;
    }

    /**
     * Перегенерация файла модулей.
     * @return \yii\web\Response
     */
    public function actionWriteEnvGlobalFile()
    {
        $env = (string)\Yii::$app->request->get('env');
        if (!$env) {
            \Yii::$app->session->setFlash('error', \Yii::t('skeeks/cms', 'Not Specified Places to record'));
            return $this->redirect(\Yii::$app->request->getReferrer());
        }

        $content = <<<PHP
<?php
defined('YII_ENV') or define('YII_ENV', '{$env}');
PHP;

        $file = new File(APP_ENV_GLOBAL_FILE);
        if ($file->write($content)) {
            \Yii::$app->session->setFlash('success', \Yii::t('skeeks/cms', 'File successfully created and written'));
        } else {
            \Yii::$app->session->setFlash('error', \Yii::t('skeeks/cms', 'Failed to write file'));
        }

        return $this->redirect(\Yii::$app->request->getReferrer());
    }

    public function actionRemoveEnvGlobalFile()
    {
        $file = new File(APP_ENV_GLOBAL_FILE);
        if ($file->remove()) {
            \Yii::$app->session->setFlash('success', \Yii::t('skeeks/cms', 'File deleted successfully'));
        } else {
            \Yii::$app->session->setFlash('error', \Yii::t('skeeks/cms', 'Could not delete the file'));
        }

        return $this->redirect(\Yii::$app->request->getReferrer());
    }


    /**
     * Returns data about extensions
     *
     * @return array
     */
    public function getExtensions()
    {
        $data = [];
        foreach (\Yii::$app->extensions as $extension) {
            $data[$extension['name']] = $extension['version'];
        }

        return $data;
    }


}