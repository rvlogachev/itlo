<?php
namespace common\modules\cms\controllers;

use common\modules\backend\controllers\BackendModelStandartController;
use common\modules\cms\models\CmsUserUniversalPropertyEnum;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminCmsUserUniversalPropertyEnumController extends BackendModelStandartController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';

    public function init()
    {
        $this->name = "Управление значениями свойств пользователя";
        $this->modelShowAttribute = "value";
        $this->modelClassName = CmsUserUniversalPropertyEnum::class;

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
                        'property_id'
                    ]
                ],
                'grid' => [
                    'visibleColumns' => [
                        'checkbox',
                        'actions',
                        'id',
                        'property_id',
                        'value',
                        'code',
                        'priority',
                    ]
                ]
            ]
        ]);
    }

}
