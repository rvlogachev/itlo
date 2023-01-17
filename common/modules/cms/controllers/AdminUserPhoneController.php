<?php

namespace common\modules\cms\controllers;

use common\modules\backend\controllers\BackendModelStandartController;
use common\modules\cms\models\CmsUserPhone;
use common\modules\cms\modules\admin\controllers\AdminModelEditorController;

/**
 * Class AdminUserEmailController
 * @package common\modules\cms\controllers
 */
class AdminUserPhoneController extends BackendModelStandartController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    public function init()
    {
        $this->name = "Управление телефонами";
        $this->modelShowAttribute = "value";
        $this->modelClassName = CmsUserPhone::className();

        parent::init();

    }

}
