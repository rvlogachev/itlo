<?php

namespace common\modules\api\controllers\api;

use yii\base\BaseObject;
use yii\web\NotFoundHttpException;
use common\modules\api\controllers\RestController;
use Yii;

class TicketsController extends RestController
{
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        $module_id = 'tickets';
        if($this->module->module)
            $module_id = $this->module->module->id . '/' . $module_id;

        $this->modelClass = new BaseObject();
        if(class_exists('\common\modules\tickets\models\Tickets') && Yii::$app->hasModule($module_id))
            $this->modelClass = 'common\modules\api\models\api\TicketsAPI';
        else
            throw new NotFoundHttpException('Requested API not found.');

        parent::init();
    }
}

?>