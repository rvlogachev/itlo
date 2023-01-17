<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsBgVideoAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/hs-bg-video/hs-bg-video.css'
    ];

    public $js = [
        'assets/vendor/hs-bg-video/hs-bg-video.js',
        'assets/vendor/hs-bg-video/vendor/player.min.js',
        'assets/js/helpers/hs.bg-video.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class
    ];
}