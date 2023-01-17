<?php
namespace common\modules\cms\controllers;

use common\modules\backend\actions\BackendModelUpdateAction;
use common\modules\backend\controllers\BackendModelController;
use common\modules\cms\components\Cms;
use common\modules\cms\models\CmsUser;
use common\modules\cms\modules\form\Field;
use common\modules\cms\modules\form\fields\PasswordField;
use common\modules\cms\modules\form\fields\WidgetField;
use yii\base\DynamicModel;
use yii\base\Event;
use yii\base\Exception;
use yii\helpers\ArrayHelper;

/**
 * Class UpaPersonalController
 * @package skeeks\cms\controllers
 */
class UpaPersonalController extends BackendModelController
{
    public $defaultAction = 'update';

    public function init()
    {
        $this->name = ['skeeks/cms', 'Personal data'];
        $this->modelClassName = \Yii::$app->user->identityClass;
        $this->modelShowAttribute = 'displayName';

        $this->permissionNames = [
            Cms::UPA_PERMISSION => 'Доступ к персональной части',
        ];

        parent::init();
    }

    public function getModel()
    {
        return \Yii::$app->user->identity;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        $actions = ArrayHelper::merge(parent::actions(), [
                "update"          => [
                    'buttons' => ['save'],
                    'class'   => BackendModelUpdateAction::class,
                    'name'    => ['skeeks/cms', 'Personal data'],
                    'fields'  => [$this, 'updateFields'],
                ],
                "change-password" => [
                    'buttons'           => ['save'],
                    'class'             => BackendModelUpdateAction::class,
                    'name'              => ['skeeks/cms', 'Change password'],
                    'icon'              => 'fa fa-key',
                    'defaultView'       => 'change-password',
                    'on initFormModels' => function (Event $e) {
                        $model = $e->sender->model;
                        $dm = new DynamicModel(['pass', 'pass2']);
                        $dm->addRule(['pass', 'pass2'], 'string', ['min' => 6]);
                        $dm->addRule(['pass', 'pass2'], 'required');
                        $dm->addRule(['pass', 'pass2'], function ($attribute) use ($dm) {
                            if ($dm->pass != $dm->pass2) {
                                $dm->addError($attribute, \Yii::t('skeeks/cms', 'New passwords do not match'));
                                return false;
                            }
                        });
                        $e->sender->formModels['dm'] = $dm;
                    },

                    'on beforeSave' => function (Event $e) {
                        /**
                         * @var $action BackendModelUpdateAction;
                         * @var $model CmsUser;
                         */
                        $action = $e->sender;
                        $model = $action->model;
                        $action->isSaveFormModels = false;
                        $dm = ArrayHelper::getValue($action->formModels, 'dm');

                        $model->setPassword($dm->pass);

                        if ($model->save()) {
                            //$action->afterSaveUrl = Url::to(['update', 'pk' => $newModel->id, 'content_id' => $newModel->content_id]);
                        } else {
                            throw new Exception(print_r($model->errors, true));
                        }

                    },

                    'fields' => [
                        'dm.pass'  => [
                            'class' => PasswordField::class,
                            'label' => ['skeeks/cms', 'New password'],
                        ],
                        'dm.pass2' => [
                            'class' => PasswordField::class,
                            'label' => ['skeeks/cms', 'New password (again)'],
                        ],
                    ],
                ],
            ]
        );


        foreach ($actions as $key => $action) {
            $actions[$key]['accessCallback'] = true;
        }

        return $actions;
    }

    
    public function updateFields()
    {
        return [
            'image_id' => [
                'class'        => WidgetField::class,
                'widgetClass'  => \skeeks\cms\widgets\AjaxFileUploadWidget::class,
                'widgetConfig' => [
                    'accept'   => 'image/*',
                    'multiple' => false,
                ],
            ],
            /*'username',*/
            'last_name',
            'first_name',
            'patronymic',
            'email',
            'phone'    => [
                'elementOptions'  => [
                    'placeholder' => '+7 903 722-28-73',
                ],
                'on beforeRender' => function (Event $e) {
                    /**
                     * @var $field Field
                     */
                    $field = $e->sender;
                    \skeeks\cms\admin\assets\JqueryMaskInputAsset::register(\Yii::$app->view);
                    $id = \yii\helpers\Html::getInputId($field->model, $field->attribute);
                    \Yii::$app->view->registerJs(<<<JS
                        $("#{$id}").mask("+7 999 999-99-99");
JS
                    );
                },
            ],
        ];
    }
}