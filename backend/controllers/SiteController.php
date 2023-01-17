<?php

namespace backend\controllers;

use common\components\Access;
use Yii;

/**
 * Site controller
 */
class SiteController extends \yii\web\Controller
{
	use Access;
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function beforeAction($action)
    {

        $this->layout = Yii::$app->user->isGuest || !Yii::$app->user->can('loginToBackend') ? '@backend/themes/adminlte/views/layouts/base' : '@backend/themes/adminlte/views/layouts/common';

        return parent::beforeAction($action);
    }

    public function actionAdminlte() {

        $this->layout = '@backend/themes/adminlte/views/layouts/common';

        return $this->render('@backend/themes/adminlte/views/index', [

        ]);

    }

    public function actionButterfly() {

        $this->layout = '@backend/themes/adminlte/views/layouts/common';

        return $this->render('@backend/themes/adminlte/views/butterfly', [

        ]);

    }

}
