<?php
namespace common\modules\cms\controllers;

use common\modules\backend\controllers\BackendModelStandartController;
use common\modules\cms\grid\BooleanColumn;
use common\modules\cms\models\CmsSite;
use common\modules\cms\models\CmsSiteDomain;
use common\modules\cms\modules\form\fields\BoolField;
use common\modules\cms\modules\form\fields\HiddenField;
use common\modules\cms\modules\form\fields\SelectField;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminCmsSiteDomainController extends BackendModelStandartController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    public function init()
    {
        $this->name = \Yii::t('skeeks/cms', "Managing domains");
        $this->modelShowAttribute = "domain";
        $this->modelClassName = CmsSiteDomain::class;

        $this->generateAccessActions = false;
        $this->permissionName = 'cms/admin-cms-site';

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
                        'domain',
                        'cms_site_id',
                    ],
                ],
                'grid'    => [
                    'visibleColumns' => [
                        'checkbox',
                        'actions',
                        'id',
                        'domain',
                        'cms_site_id',
                        'is_main',
                        'is_https',
                    ],
                    'columns' => [
                        'is_main' => [
                            'class' => BooleanColumn::class,
                            'trueValue' => 1,
                            'falseValue' => 0,
                        ],
                        'is_https' => [
                            'class' => BooleanColumn::class,
                            'trueValue' => 1,
                            'falseValue' => 0,
                        ],
                    ]
                ],
            ],
            "create" => [
                'fields' => [$this, 'updateFields'],
            ],
            "update" => [
                'fields' => [$this, 'updateFields'],
            ],
        ]);
    }

    public function updateFields($action)
    {
        /**
         * @var $model CmsSiteDomain
         */
        $model = $action->model;
        $model->load(\Yii::$app->request->get());

        if ($code = \Yii::$app->request->get('cms_site_id'))
        {
            $model->cms_site_id = $code;
            $field = [
                'class' => HiddenField::class,
                'label' => false
            ];
        } else {
            $field = [
                'class' => SelectField::class,
                'items' => function() {
                    return ArrayHelper::map(CmsSite::find()->all(), 'id', 'asText');
                }
            ];
        }
        $updateFields = [
            'domain',
            'is_main' => [
                'class' => BoolField::class,
                'allowNull' => false,
                'formElement' => BoolField::ELEMENT_CHECKBOX,
            ],
            'is_https' => [
                'class' => BoolField::class,
                'allowNull' => false,
                'formElement' => BoolField::ELEMENT_CHECKBOX,
            ],
            'cms_site_id' => $field,
        ];

        return $updateFields;
    }
}
