<?php
namespace common\modules\cms\modules\themeunify\admin\assets;

use  common\modules\cms\modules\assetsunifyv2min\base\UnifyAsset;
use common\modules\cms\base\AssetBundle;
use  common\modules\cms\modules\themeunify\admin\assets\UnifyAdminAsset;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminIframeAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/themeunify/admin/assets/src/';

    public $css = [
    ];

    public $js = [
        'js/classes/Iframe.js',
    ];

    public $depends = [
        UnifyAdminAsset::class,
    ];
}