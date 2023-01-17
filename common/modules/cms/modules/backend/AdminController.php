<?php
namespace common\modules\cms\modules\backend;

use common\modules\backend\BackendController;

/**
 * Class AdminController
 * @package skeeks\cms\admin
 * @deprecated
 */
abstract class AdminController extends BackendController
{
    /**
     * @return array
     */
    /*public function getPermissionNames()
    {
        return [
            CmsManager::PERMISSION_ADMIN_ACCESS => \Yii::t('skeeks/cms', 'Access to the administration system'),
            $this->permissionName => $this->name
        ];
    }*/
}