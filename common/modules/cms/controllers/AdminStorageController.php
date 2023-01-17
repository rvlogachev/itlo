<?php
namespace common\modules\cms\controllers;

use common\modules\cms\modules\admin\actions\AdminAction;
use common\modules\cms\modules\admin\controllers\AdminController;

/**
 * Class AdminStorageFilesController
 * @package common\modules\cms\controllers
 */
class AdminStorageController extends AdminController
{

    public $layout = '@backend/themes/adminlte/views/layouts/common';

    public function init()
    {
        $this->name = "Управление серверами";
        $this->generateAccessActions = false;
        parent::init();
    }

    public function actions()
    {
        return [
            "index" => [
                "class"    => AdminAction::className(),
                "name"     => "Управление серверами",
                "callback" => [$this, 'actionIndex'],
            ],
        ];
    }

    public function actionIndex()
    {


        $clusters = \Yii::$app->storage->getClusters();


        return $this->render($this->action->id);
    }

}
