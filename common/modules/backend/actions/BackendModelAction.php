<?php
namespace common\modules\backend\actions;
use common\modules\backend\controllers\IBackendModelController;
use common\modules\backend\ViewBackendAction;
use common\modules\cms\rbac\CmsManager;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\Application;

/**
 * @property IHasInfoActions|IBackendModelController    $controller
 * @property string $ownPermissionName;
 * @property string $permissionName;
 * @property Model $model;
 * @property string $modelClassName;
 *
 * Class BackendModelAction
 * @package skeeks\cms\backend\actions
 */
class BackendModelAction extends ViewBackendAction
    implements IBackendModelAction
{
    use TBackendModelAction;
}