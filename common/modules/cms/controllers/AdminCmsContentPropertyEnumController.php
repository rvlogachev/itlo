<?php
namespace common\modules\cms\controllers;

use common\modules\backend\controllers\BackendModelStandartController;
use common\modules\cms\models\CmsContentPropertyEnum;
use common\modules\cms\modules\form\fields\SelectField;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class AdminCmsContentPropertyEnumController extends BackendModelStandartController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';

    public function init()
    {
        $this->name = \Yii::t('skeeks/cms', 'Managing property values');
        $this->modelShowAttribute = "value";
        $this->modelClassName = CmsContentPropertyEnum::class;

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
                            'value'     => function (CmsContentPropertyEnum $model) {
                                return Html::a($model->value, "#", [
                                    'class' => "sx-trigger-action",
                                ]);
                            },
                        ],
                    ]
                ],
            ],
            'create' => [
                'fields' => [$this, 'updateFields'],
            ],
            'update' => [
                'fields' => [$this, 'updateFields'],
            ],
        ]);
    }

    public function updateFields($action)
    {
        /**
         * @var $model CmsTreeTypeProperty
         */
        $model = $action->model;
        //$model->load(\Yii::$app->request->get());

        return [
            'property_id' => [
                'class' => SelectField::class,
                'items' => function() {
                    return \yii\helpers\ArrayHelper::map(
                        \skeeks\cms\models\CmsContentProperty::find()->all(),
                        "id",
                        "name"
                    );
                }
            ],
            'value',
            'code',
            'priority',
        ];
    }
}
