<?php
namespace common\modules\cms\controllers;

use common\modules\backend\controllers\BackendModelStandartController;
use common\modules\cms\models\CmsUserEmail;
use common\modules\cms\modules\admin\controllers\AdminModelEditorController;

/**
 * Class AdminUserEmailController
 * @package skeeks\cms\controllers
 */
class AdminUserEmailController extends BackendModelStandartController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    public function init()
    {
        $this->name = "Управление email адресами";
        $this->modelShowAttribute = "value";
        $this->modelClassName = CmsUserEmail::className();

        parent::init();
    }

}
