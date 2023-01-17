<?php
namespace common\modules\cms\controllers;

use common\modules\backend\controllers\BackendModelStandartController;
use common\modules\cms\models\CmsTreeTypePropertyEnum;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminCmsTreeTypePropertyEnumController extends BackendModelStandartController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    public function init()
    {
        $this->name = \Yii::t('skeeks/cms', 'Managing partition property values');
        $this->modelShowAttribute = "value";
        $this->modelClassName = CmsTreeTypePropertyEnum::class;

        $this->generateAccessActions = false;

        parent::init();

    }

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'filters' => [
                    'visibleFilters' => [
                        'value',
                        'property_id',
                    ],
                ],
                'grid'    => [
                    'visibleColumns' => [
                        'checkbox',
                        'actions',
                        'id',
                        'value',
                        'property_id',
                        'code',
                        'priority',
                    ],
                    'columns' => [
                        'value' => [
                            'attribute' => "value",
                            'format'    => "raw",
                            'value'     => function (CmsTreeTypePropertyEnum $model) {
                                return Html::a($model->value, "#", [
                                    'class' => "sx-trigger-action",
                                ]);
                            },
                        ],
                    ]
                ],
            ],
        ]);
    }

}
