<?php
namespace common\modules\cms\modules\shop\controllers;

use common\modules\cms\actions\backend\BackendModelMultiActivateAction;
use common\modules\cms\actions\backend\BackendModelMultiDeactivateAction;
use common\modules\cms\backend\controllers\BackendModelStandartController;
use common\modules\cms\backend\grid\DefaultActionColumn;
use common\modules\cms\grid\BooleanColumn;
use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\models\CmsAgent;
use common\modules\cms\shop\models\ShopPaySystem;
use common\modules\cms\shop\paysystem\PaysystemHandler;
use common\modules\cms\modules\form\Builder;
use common\modules\cms\modules\form\fields\BoolField;
use common\modules\cms\modules\form\fields\FieldSet;
use common\modules\cms\modules\form\fields\NumberField;
use common\modules\cms\modules\form\fields\SelectField;
use common\modules\cms\modules\form\fields\TextareaField;
use yii\base\Event;
use yii\base\Exception;
use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminPaySystemController extends BackendModelStandartController
{
    public $notSubmitParam = 'sx-not-submit';

    public function init()
    {
        $this->name = \Yii::t('skeeks/shop/app', 'Payment systems');
        $this->modelShowAttribute = "name";
        $this->modelClassName = ShopPaySystem::class;

        $this->generateAccessActions = false;

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(),
            [
                'index' => [
                        "backendShowings" => false,
                        "filters"         => false,

                        'grid' => [
                            'on init' => function (Event $e) {
                                /**
                                 * @var $dataProvider ActiveDataProvider
                                 * @var $query ActiveQuery
                                 */
                                $query = $e->sender->dataProvider->query;

                                $query->andWhere(['cms_site_id' => \Yii::$app->skeeks->site->id]);
                            },

                            'defaultOrder' => [
                                'priority' => SORT_ASC,
                            ],

                            'visibleColumns' => [
                                'checkbox',
                                'actions',
                                'name',
                                'is_active',
                                'priority',
                            ],

                            "columns" => [
                                'name' => [
                                    'class'         => DefaultActionColumn::class,
                                    'viewAttribute' => 'asText',
                                ],
                                'priority',

                                [
                                    'class'     => DataColumn::class,
                                    'attribute' => "personTypeIds",
                                    'filter'    => false,
                                    'value'     => function (ShopPaySystem $model) {
                                        return implode(", ", ArrayHelper::map($model->personTypes, 'id', 'name'));
                                    },
                                ],

                                'is_active' => [
                                    'class'     => BooleanColumn::class,
                                    'attribute' => "is_active",
                                ],
                            ],
                        ],
                    ],

                "create" => [
                    'fields'        => [$this, 'updateFields'],
                    'on beforeSave' => function (Event $e) {
                        /**
                         * @var $action BackendModelUpdateAction;
                         * @var $model CmsUser;
                         */
                        $action = $e->sender;
                        $model = $action->model;
                        $action->isSaveFormModels = false;

                        if (isset($action->formModels['handler'])) {
                            $handler = $action->formModels['handler'];
                            $model->component_config = $handler->toArray();
                        }

                        if ($model->save()) {
                            //$action->afterSaveUrl = Url::to(['update', 'pk' => $newModel->id, 'content_id' => $newModel->content_id]);
                        } else {
                            throw new Exception(print_r($model->errors, true));
                        }

                    },
                ],
                "update" => [
                    'fields'        => [$this, 'updateFields'],
                    'on beforeSave' => function (Event $e) {
                        /**
                         * @var $action BackendModelUpdateAction;
                         * @var $model CmsUser;
                         */
                        $action = $e->sender;
                        $model = $action->model;
                        $action->isSaveFormModels = false;

                        if (isset($action->formModels['handler'])) {
                            $handler = $action->formModels['handler'];
                            $model->component_config = $handler->toArray();
                        }


                        if ($model->save()) {
                            //$action->afterSaveUrl = Url::to(['update', 'pk' => $newModel->id, 'content_id' => $newModel->content_id]);
                        } else {
                            throw new Exception(print_r($model->errors, true));
                        }

                    },

                ],

                "activate-multi" => [
                    'class' => BackendModelMultiActivateAction::class,
                ],

                "deactivate-multi" => [
                    'class' => BackendModelMultiDeactivateAction::class,
                ],
            ]
        );
    }


    public function updateFields($action)
    {
        $handlerFields = [];
        /**
         * @var $handler PaysystemHandler
         */
        if ($action->model && $action->model->handler) {
            $handler = $action->model->handler;
            $handlerFields = $handler->getConfigFormFields();
            $handlerFields = Builder::setModelToFields($handlerFields, $handler);

            $action->formModels['handler'] = $handler;
            if ($post = \Yii::$app->request->post()) {
                $handler->load($post);
            }

        }

        $result = [
            'main'         => [
                'class'  => FieldSet::class,
                'name'   => \Yii::t('skeeks/shop/app', 'Main'),
                'fields' => [

                    'name',

                    'description' => [
                        'class' => TextareaField::class,
                    ],

                    'is_active' => [
                        'class'     => BoolField::class,
                        'allowNull' => false,
                    ],

                    'personTypeIds' => [
                        'class'    => SelectField::class,
                        'multiple' => true,
                        'items'    => \yii\helpers\ArrayHelper::map(\skeeks\cms\shop\models\ShopPersonType::find()->all(), 'id', 'name'),
                    ],


                    'priority' => [
                        'class' => NumberField::class
                    ],

                    'component' => [
                        'class'   => SelectField::class,
                        'items'   => \Yii::$app->shop->getPaysystemHandlersForSelect(),
                        'elementOptions' => [
                            RequestResponse::DYNAMIC_RELOAD_FIELD_ELEMENT => "true",
                        ],
                    ],
                ],
            ],

        ];

        if ($handlerFields) {
            $result = ArrayHelper::merge($result, [
                'handler' => [
                    'class'  => FieldSet::class,
                    'name'   => "Настройки платежной системы",
                    'fields' => $handlerFields,
                ],
            ]);
        }


        return $result;
    }

}
