<?php
namespace common\modules\cms\modules\toolbar\assets;

use common\modules\cms\base\AssetBundle;

/**
 * Class CmsToolbarAsset
 * @package common\modules\cms\toolbar\assets
 */
class CmsToolbarAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/toolbar/assets/src';

    public $css = [
        'old-toolbar.css',
        'yii-debug-toolbar.css',
        'toolbar.css',
    ];

    public $js =
        [
            'classes/window.js',
            'classes/dialog.js',
            'classes/edit-view-block.js',
            'toolbar.js',
        ];

    public $depends = [
        'common\modules\cms\modules\sx\assets\Core',
    ];
}
