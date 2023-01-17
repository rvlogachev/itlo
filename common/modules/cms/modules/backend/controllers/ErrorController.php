<?php
namespace common\modules\cms\modules\backend\controllers;

use yii\web\Controller;

/**
 * Class ErrorController
 * @package skeeks\cms\admin\controllers
 */
class ErrorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'common\modules\cms\modules\backend\actions\ErrorAction',
            ],
        ];
    }

}
