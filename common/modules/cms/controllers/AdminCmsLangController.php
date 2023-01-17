<?php
namespace common\modules\cms\controllers;

use common\modules\cms\actions\backend\BackendModelMultiActivateAction;
use common\modules\cms\actions\backend\BackendModelMultiDeactivateAction;
use common\modules\backend\controllers\BackendModelStandartController;
use common\modules\cms\grid\BooleanColumn;
use common\modules\cms\grid\ImageColumn2;
use common\modules\cms\models\CmsLang;
use common\modules\cms\modules\form\fields\BoolField;
use common\modules\cms\modules\form\fields\WidgetField;
use common\modules\cms\widgets\AjaxFileUploadWidget;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminCmsLangController extends BackendModelStandartController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    public function init()
    {

        $this->name = \Yii::t('skeeks/cms', "Management of languages");
        $this->modelShowAttribute = "name";
        $this->modelClassName = CmsLang::class;

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
                "filters" => [
                    'visibleFilters' => [
                        'id',
                        'name',
                    ],
                ],
                'grid'    => [
                    'defaultOrder' => [
                        'is_active' => SORT_DESC,
                        'priority' => SORT_ASC,
                    ],
                    'visibleColumns' => [
                        'checkbox',
                        'actions',
                        'id',
                        'image_id',
                        'name',
                        'code',
                        'is_active',
                        'priority',
                    ],
                    'columns'        => [
                        'is_active'   => [
                            'class' => BooleanColumn::class,
                        ],

                        'image_id' => [
                            'class' => ImageColumn2::class,
                        ],
                    ],
                ],
            ],
            "create" => [
                'fields' => [$this, 'updateFields'],
            ],
            "update" => [
                'fields' => [$this, 'updateFields'],
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
        return [
            'image_id' => [
                'class'        => WidgetField::class,
                'widgetClass'  =>  AjaxFileUploadWidget::class,
                'widgetConfig' => [
                    'accept'   => 'image/*',
                    'multiple' => false,
                ],
            ],
            'code',
            'is_active'   => [
                'class'      => BoolField::class,
            ],
            'name',
            'description',
            'priority',
        ];
    }
}
