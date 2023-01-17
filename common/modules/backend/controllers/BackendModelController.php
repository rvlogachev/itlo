<?php
namespace common\modules\backend\controllers;

use common\modules\backend\BackendController;
use common\modules\backend\BackendUrlRule;
use common\modules\cms\helpers\StringHelper;
use common\modules\cms\IHasModel;
use yii\filters\AccessControl;
use yii\helpers\Inflector;
use yii\helpers\Url;
use yii\web\Application;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class BackendModelController
 * @package common\modules\backend\controllers
 */
class BackendModelController extends BackendController
    implements IBackendModelController, IHasModel
{
    use TBackendModelController;
}