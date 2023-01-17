<?php
namespace common\modules\cms\controllers;

use common\modules\cms\modules\backend\AdminController;
use common\modules\backend\BackendAction;
use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\helpers\UrlHelper;
use common\modules\cms\modules\admin\actions\AdminAction;
use common\modules\cms\modules\sx\Dir;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Class IndexController
 * @package skeeks\cms\admin\controllers
 */
class AdminClearController extends AdminController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';

    public function init()
    {
        $this->name = \Yii::t('skeeks/cms', "Deleting temporary files");
        parent::init();
    }

    public function actions()
    {
        return
            [
                "index" =>
                    [
                        "class" => BackendAction::className(),
                        "name" => \Yii::t('skeeks/cms', 'Clearing temporary data'),
                        "callback" => [$this, 'actionIndex'],
                    ],
            ];
    }

    public function actionIndex()
    {
        $paths = ArrayHelper::getValue(\Yii::$app->cms->tmpFolderScheme, 'runtime');

        $clearDirs = [];

        if ($paths) {
            foreach ($paths as $path) {
                $clearDirs[] = [
                    'label' => 'Корневая временная дирриктория',
                    'dir' => new Dir(\Yii::getAlias($path), false)
                ];

                $clearDirs[] = [
                    'label' => 'Логи',
                    'dir' => new Dir(\Yii::getAlias($path . "/logs"), false)
                ];

                $clearDirs[] = [
                    'label' => 'Кэш',
                    'dir' => new Dir(\Yii::getAlias($path . "/cache"), false)
                ];

                $clearDirs[] = [
                    'label' => 'Дебаг',
                    'dir' => new Dir(\Yii::getAlias($path . "/debug"), false)
                ];
            }
        }

        $rr = new RequestResponse();
        if ($rr->isRequestAjaxPost()) {
            foreach ($clearDirs as $data) {
                $dir = ArrayHelper::getValue($data, 'dir');
                if ($dir instanceof Dir) {
                    if ($dir->isExist()) {
                        $dir->clear();
                    }
                }
            }

            \Yii::$app->db->getSchema()->refresh();
            \Yii::$app->cache->flush();

            $rr->success = true;
            $rr->message = \Yii::t('skeeks/cms', 'Cache cleared');
            return $rr;
        }

        return $this->render('index', [
            'clearDirs' => $clearDirs,
        ]);
    }


}