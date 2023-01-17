<?php
namespace common\modules\cms\modules\backend\assets;

use common\modules\cms\base\AssetBundle;

/**
 * Class ThemeRealAdminAsset
 * @package skeeks\cms\admin\assets
 */
class ThemeRealAdminAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/backend/assets/src/themes/real-admin';

    public $css = [
        //'themes/real-admin/css/jquery.mmenu.css',
        'css/simple-line-icons.css',
        'css/font-awesome.min.css',
        'css/add-ons.min.css',
        //'themes/real-admin/css/style.min.css',
        'css/style-normal.css',
    ];
    public $js = [
        //'themes/real-admin/js/jquery.mmenu.min.js',
    ];
    public $depends = [
    ];
}
