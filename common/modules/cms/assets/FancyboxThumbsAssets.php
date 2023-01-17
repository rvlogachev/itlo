<?php
namespace common\modules\cms\assets;

/**
 * Class AppAsset
 * @package backend\assets
 */
class FancyboxThumbsAssets extends FancyboxAssets
{
    public $js = [
        'helpers/jquery.fancybox-thumbs.js',
    ];

    public $css = [
        'helpers/jquery.fancybox-thumbs.css',
    ];

    public $depends = [
        '\common\modules\cms\assets\FancyboxAssets',
    ];
}
