<?php
namespace common\modules\cms\helpers\elfinder;

use common\modules\cms\rbac\CmsManager;
use Yii;

class UserPath extends \mihaildev\elfinder\volume\UserPath
{
    public function isAvailable()
    {
        if (!\Yii::$app->user->can(CmsManager::PERMISSION_ELFINDER_USER_FILES)) {
            return false;
        }

        return parent::isAvailable();
    }
}