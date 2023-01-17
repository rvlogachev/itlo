<?php
namespace common\modules\cms\controllers;

use common\modules\cms\helpers\RequestResponse;
use yii\helpers\Json;
use yii\web\Controller;

class OnlineController extends Controller
{
    /**
     * @return RequestResponse
     */
    public function actionTrigger()
    {
        $callback = \Yii::$app->request->get('callback');

        $rr = new RequestResponse();
        $rr->data['call'] = \Yii::$app->request->get('callback');
        $rr->success = true;

        $data = Json::encode($rr->toArray());
        return "{$callback}({$data})";
    }

}
