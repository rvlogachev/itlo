<?php
namespace common\modules\cms\modules\toolbar\assets;

/**
 * Class CmsToolbarFancyboxAsset
 * @package common\modules\cms\modules\toolbar\assets
 */
class CmsToolbarFancyboxAsset extends CmsToolbarAsset
{
    public $css = [];

    public $js =
        [
            'classes/window-fancybox.js',
        ];

    public $depends = [
        'common\modules\cms\assets\FancyboxAssets',
        'common\modules\cms\modules\toolbar\assets\CmsToolbarAsset',
    ];
}
