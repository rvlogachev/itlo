<?php
namespace common\modules\cms\controllers;

use common\modules\cms\base\Controller;
use Yii;


/**
 * Site controller
 */
class ErrorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'common\modules\cms\actions\ErrorAction',
            ],
        ];
    }

}
