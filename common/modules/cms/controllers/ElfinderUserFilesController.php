<?php
namespace common\modules\cms\controllers;

use common\modules\cms\rbac\CmsManager;

class ElfinderUserFilesController extends ElfinderController
{
    public function init()
    {
        $this->roots = [];

        if (\Yii::$app->user->can(CmsManager::PERMISSION_ELFINDER_USER_FILES)) {
            $this->roots[] =
                [
                    'class' => 'skeeks\cms\helpers\elfinder\UserPath',
                    'path' => 'uploads/users/{id}',
                    'name' => 'Личные файлы'
                ];
        }

        if (\Yii::$app->user->can(CmsManager::PERMISSION_ELFINDER_COMMON_PUBLIC_FILES)) {
            $this->roots[] =
                [
                    'path' => 'uploads/inbox',
                    'name' => 'Общие файлы'
                ];
        }

        parent::init();

        \Yii::$app->cmsToolbar->enabled = false;
    }
}