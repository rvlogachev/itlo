<?php

namespace api\modules\v1\controllers;

use common\models\Device;
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
class DeviceController extends Controller
{
    public $enableCsrfValidation = false;
    const STATUS_ACTIVE = 1;
    const STATUS_BUSY = 0;

    /** Термометр */
    const DEVICE_TEMP = 'temp';

    /** Алкометр */
    const DEVICE_ALCO = 'alco';

    /** Тонометр/оксиметр */
    const DEVICE_BPP = 'bpp';

    /** Биометрическая идентификация */
    const DEVICE_TRACK = 'track';
    const DEVICE_CAPTURE = 'capture';

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                // restrict access to
                'Origin' => ['*'],
                'Access-Control-Allow-Origin' => ['*'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
            ],

        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'options' => [
                'class' => OptionsAction::class
            ]
        ];
    }

    /**
     * @return User|null|\yii\web\IdentityInterface
     */
    public function actionIndex()
    {
        $resource = new User();
        $resource->load(\Yii::$app->user->getIdentity()->attributes, '');
        return $resource;
    }


    public function actionMeasure()
    {

        $device = \Yii::$app->request->get('id');
        $modeldevice = Device::find()->where(['key' => $device, 'status' => self::STATUS_ACTIVE])->one();
        if ($modeldevice) {
            $modeldevice->status = self::STATUS_BUSY;
            if (!$modeldevice->update()) {
                return ['error' => $modeldevice->getErrors()];
            }

            switch ($device) {
                case self::DEVICE_TEMP:
                    return ['status' => 'busy', self::DEVICE_TEMP => 'n/a'];
                    break;
                case self::DEVICE_ALCO:
                    return ['status' => 'busy', self::DEVICE_ALCO => 'n/a'];
                    break;
                case self::DEVICE_BPP:
                    return ['status' => 'busy', 'sys' => 'n/a', 'dia' => 'n/a', 'map' => 'n/a', 'pulse' => 'n/a'];
                    break;

            }


        }
        return ['error' => 'No found active device'];
    }


    public function actionRead()
    {
        $device = \Yii::$app->request->get('id');
        $modeldevice = Device::find()->where(['key' => $device, 'status' => self::STATUS_BUSY])->one();
        if ($modeldevice) {
            $modeldevice->status = self::STATUS_ACTIVE;
            if (!$modeldevice->update()) {
                return ['error' => $modeldevice->getErrors()];
            }

            switch ($device) {
                case self::DEVICE_TEMP:
                    return ['status' => 'ready', self::DEVICE_TEMP => '36.' . rand(1, 6)];
                    break;
                case self::DEVICE_ALCO:
                    return ['status' => 'ready', self::DEVICE_ALCO => '0.00' . rand(1, 3)];
                    break;
                case self::DEVICE_BPP:
                    return ['status' => 'ready', 'sys' => rand(110, 120), 'dia' => rand(60, 90), 'map' => rand(90, 120), 'pulse' => rand(60, 80)];
                    break;

            }
        }
        return ['status' => 'error', 'description' => 'No found active device'];
    }


    public function actionTrack()
    {
        $path = \Yii::getAlias("@base") . "/r.base64";
        $fileBase64 = file_get_contents($path);
        return ['status' => 'ready', 'dataset' => $fileBase64];
        //return ['status' => 'error', 'dataset' => ''];
    }


    public function actionRecognize()
    {
        $path = \Yii::getAlias("@base") . "/r.base64";
        $fileBase64 = file_get_contents($path);
        return ['status' => 'ready', 'id' => '934d9ef5-1867-11eb-ba39-0242ac170002'];
        //return ['status' => 'error', 'dataset' => ''];
    }


    public function actionCapture()
    {
        $path = \Yii::getAlias("@base") . "/t.base64";
        $fileBase64 = file_get_contents($path);
        return ['status' => 'ready', 'dataset' => $fileBase64];
	  //  return ['status' => 'error', 'dataset' => ''];
    }

    public function actionAlco()
    {
        return ['status' => 'ready', self::DEVICE_ALCO => '0.009'];

    }

    public function actionTemp()
    {
        return ['status' => 'ready', self::DEVICE_TEMP => '36.5'];//. rand(1, 9)];

    }

    public function actionBpp()
    {

        return ['status' => 'ready', 'sys' => 125, 'dia' => 80, 'map' => rand(90, 120), 'pulse' => 70];

    }
    public function actionCamera()
    {

        return ['status' => 'enable'];

    }

}
