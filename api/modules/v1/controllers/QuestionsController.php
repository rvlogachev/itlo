<?php

namespace api\modules\v1\controllers;

use common\models\Device;
use common\models\Questions;
use common\models\User;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\HttpHeaderAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\Controller;
use yii\rest\OptionsAction;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class QuestionsController extends Controller
{

    const STATUS_ACTIVE = 1;
    const STATUS_BUSY = 0;


    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();


        $behaviors['corsFilter'] = [
        'class' => \yii\filters\Cors::className(),
        'cors' => [
            // restrict access to
            'Origin' => ['*'],
            'Access-Control-Allow-Origin' => ['*'],

        ],

    ];


//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::class,
//            'authMethods' => [
//                HttpBasicAuth::class,
//                HttpBearerAuth::class,
//                HttpHeaderAuth::class,
//                QueryParamAuth::class
//            ]
//        ];

        return $behaviors;
    }





    public function actionAll()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = Questions::find()->all();
        return $model;

    }












}
