<?php
namespace common\modules\cms\assets;

use common\modules\cms\base\AssetBundle;

/**
 * Class AppAsset
 * @package backend\assets
 */
class FancyboxAssets extends AssetBundle
{
    public $sourcePath = '@bower/fancybox/dist';

    public $js = [
        'jquery.fancybox.js',
    ];

    public $css = [
        'jquery.fancybox.css',
    ];
}
