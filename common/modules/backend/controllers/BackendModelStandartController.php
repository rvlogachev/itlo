<?php 
namespace common\modules\backend\controllers;

use common\modules\backend\actions\BackendGridModelAction;
use common\modules\backend\actions\BackendModelCreateAction;
use common\modules\backend\actions\BackendModelDeleteAction;
use common\modules\backend\actions\BackendModelMultiDeleteAction;
use common\modules\backend\actions\BackendModelUpdateAction;
use common\modules\cms\helpers\RequestResponse;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class BackendModelStandartController extends BackendModelController
{



    public function actions()
    {
        $actions = ArrayHelper::merge(parent::actions(), [
            'index' => [
                'class' => BackendGridModelAction::class,
            ],

            "create" => [
                'class' => BackendModelCreateAction::class,
            ],

            "update" => [
                'class'    => BackendModelUpdateAction::class,
                'priority' => 100,
            ],
            "delete" => [
                'class'    => BackendModelDeleteAction::class,
                'priority' => 9999,
            ],

            "delete-multi" => [
                'class' => BackendModelMultiDeleteAction::class,
            ],
        ]);

        return $actions;
    }
}