<?php
namespace common\modules\cms\controllers;

use common\modules\cms\helpers\UrlHelper;
use common\modules\cms\models\Comment;
use common\modules\cms\modules\admin\actions\AdminAction;
use common\modules\cms\modules\admin\controllers\AdminController;
use Yii;
use common\modules\cms\models\User;
use common\modules\cms\models\searchs\User as UserSearch;

/**
 * Class AdminFileManagerController
 * @package common\modules\cms\controllers
 */
class AdminFileManagerController extends AdminController
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';
    public function init()
    {
        if (!$this->name) {
            $this->name = "Файловый менеджер";
        }

        parent::init();
    }

    public function actionIndex()
    {
        return $this->render($this->action->id);
    }
}
