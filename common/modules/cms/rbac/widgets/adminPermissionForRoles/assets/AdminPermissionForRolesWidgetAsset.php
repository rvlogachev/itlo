<?php
namespace common\modules\cms\rbac\widgets\adminPermissionForRoles\assets;

use common\modules\cms\base\AssetBundle;

/**
 * Class AdminPermissionForRolesWidgetAsset
 * @package skeeks\cms\rbac\widgets\adminPermissionForRoles\assets
 */
class AdminPermissionForRolesWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/rbac/widgets/adminPermissionForRoles/assets/src';

    public $css = [];

    public $js = [
        'app.js'
    ];

    public $depends = [
        'common\modules\cms\modules\sx\assets\Custom',
        'common\modules\cms\modules\sx\assets\ComponentAjaxLoader'
    ];
}
