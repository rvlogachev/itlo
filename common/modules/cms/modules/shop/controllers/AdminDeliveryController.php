<?php
namespace common\modules\cms\modules\shop\controllers;

use common\modules\cms\actions\backend\BackendModelMultiActivateAction;
use common\modules\cms\actions\backend\BackendModelMultiDeactivateAction;
use common\modules\backend\controllers\BackendModelStandartController;
use common\modules\backend\grid\DefaultActionColumn;
use common\modules\cms\grid\BooleanColumn;
use common\modules\cms\grid\ImageColumn;
use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\models\CmsAgent;
use common\modules\cms\modules\shop\components\DeliveryHandlerComponent;
use common\modules\cms\modules\shop\deliveries\BoxberryDeliveryHandler;
use common\modules\cms\modules\shop\models\ShopDelivery;
use common\modules\cms\widgets\AjaxFileUploadWidget;
use common\modules\cms\modules\form\Builder;
use common\modules\cms\modules\form\fields\BoolField;
use common\modules\cms\modules\form\fields\FieldSet;
use common\modules\cms\modules\form\fields\SelectField;
use common\modules\cms\modules\form\fields\TextareaField;
use common\modules\cms\modules\form\fields\WidgetField;
use yii\base\Event;
use yii\helpers\ArrayHelper;

/**
 * Class AdminTaxController
 * @package common\modules\cms\modules\shop\controllers
 */
class AdminDeliveryController extends BackendModelStandartController
{
    public function init()
    {
        $this->name = \Yii::t('skeeks/shop/app', 'Delivery services');
        $this->modelShowAttribute = "name";
        $this->modelClassName = ShopDelivery::class;

        $this->generateAccessActions = false;

        parent::init();
    }


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index'  => [
                "backendShowings" => false,
                "filters"         => false,

                'grid' => [
                    'on init'        => function (Event $e) {
                        /**
                         * @var $dataProvider ActiveDataProvider
                         * @var $query ActiveQuery
                         */
                        $query = $e->sender->dataProvider->query;

                        $query->andWhere(['cms_site_id' => \Yii::$app->skeeks->site->id]);
                    },
                    'defaultOrder'   => [
                        'is_active' => SORT_DESC,
                        'priority'  => SORT_ASC,
                    ],
                    'visibleColumns' => [
                        'checkbox',
                        'actions',
                        'name',
                        'price',
                        'is_active',
                        'priority',
                        'shopPaySystems',
                    ],
                    'columns'        => [
                        'name'           => [
                            'class'         => DefaultActionColumn::class,
                            'viewAttribute' => 'asText',
                        ],
                        'is_active'      => [
                            'class' => BooleanColumn::class,
                        ],
                        'logo_id'        => [
                            'relationName' => 'logo',
                            'class'        => ImageColumn::class,
                        ],
                        'shopPaySystems' => [
                            'label' => 'Платежные системы',
                            'value' => function (\skeeks\cms\shop\models\ShopDelivery $model) {
                                if ($model->shopPaySystems) {
                                    return implode(", ", \yii\helpers\ArrayHelper::map($model->shopPaySystems, 'id', 'name'));
                                } else {
                                    return 'Все';
                                }
                            },
                        ],
                    ],
                ],
            ],
            "create" => [
                'fields' => [$this, 'updateFields'],
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
                'fields' => [$this, 'updateFields'],
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
        ]);
    }

    public function updateFields($action)
    {
        $handlerFields = [];
        /**
         * @var $handler DeliveryHandlerComponent
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
            'main' => [
                'class'  => FieldSet::class,
                'name'   => \Yii::t('skeeks/shop/app', 'Main'),
                'fields' => [

                    'is_active' => [
                        'class'     => BoolField::class,
                        'allowNull' => false,
                    ],

                    'logo_id'     => [
                        'class'        => WidgetField::class,
                        'widgetClass'  => AjaxFileUploadWidget::class,
                        'widgetConfig' => [
                            'accept'   => 'image/*',
                            'multiple' => false,
                        ],
                    ],


                    'name',
                    'description' => [
                        'class' => TextareaField::class,
                    ],

                    'priority',


                    'price',

                    'currency_code' => [
                        'class' => SelectField::class,
                        'items' => \yii\helpers\ArrayHelper::map(\skeeks\cms\money\models\MoneyCurrency::find()->where(['is_active' => 1])->all(), 'code', 'code'),
                    ],

                                        'order_price_from',
                                        'order_price_to',


                ],
            ],
            'additionally' => [
                'class'  => FieldSet::class,
                'name'   => \Yii::t('skeeks/shop/app', 'Additionally'),
                'fields' => [


                    /*'weight_from',
                    'weight_to',


                    'order_price_from',
                    'order_price_to',

                    'order_currency_code' => [
                        'class' => SelectField::class,
                        'items' => \yii\helpers\ArrayHelper::map(\skeeks\cms\money\models\MoneyCurrency::find()->where(['is_active' => 1])->all(), 'code', 'code'),
                    ],*/

                    'shopPaySystems' => [
                        'class'    => SelectField::class,
                        'hint'     => "Укажите, для каких способов оплаты, доступен текущий способ доставки. Если не выбраны никакие способы оплаты, то этот способ доставки показывается всегда.",
                        'multiple' => true,
                        'items'    => \yii\helpers\ArrayHelper::map(
                            \skeeks\cms\shop\models\ShopPaySystem::find()->active()->all(), 'id', 'name'
                        ),
                    ],

                    'component' => [
                        'class'   => SelectField::class,
                        'items'   => \Yii::$app->shop->getDeliveryHandlersForSelect(),
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
                    'name'   => "Настройки обработчика",
                    'fields' => $handlerFields
                ]
            ]);
        }


        return $result;
    }

}
