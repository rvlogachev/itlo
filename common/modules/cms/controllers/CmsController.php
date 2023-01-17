<?php
namespace common\modules\cms\controllers;

use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\helpers\UrlHelper;
use yii\db\Exception;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Class CmsController
 * @package skeeks\cms\controllers
 */
class CmsController extends Controller
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';

    public function actionIndex()
    {
        return $this->render($this->action->id);
    }
}