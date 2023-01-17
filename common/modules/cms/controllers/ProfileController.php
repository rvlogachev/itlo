<?php
namespace common\modules\cms\controllers;

use common\modules\cms\filters\CmsAccessControl;
use yii\web\Controller;

/**
 * Class ProfileController
 * @package common\modules\cms\controllers
 */
class ProfileController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return
            [
                //Closed all by default
                'access' =>
                    [
                        'class' => CmsAccessControl::className(),
                        'rules' =>
                            [
                                [
                                    'allow' => true,
                                    'roles' => ['@'],
                                    'actions' => ['index'],
                                ]
                            ]
                    ],
            ];
    }

    /**
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(\Yii::$app->user->identity->profileUrl);
    }

}
