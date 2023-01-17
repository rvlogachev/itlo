<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsOnscrollAnimationAsset extends UnifyAsset
{
    public $css = [
    ];

    public $js = [
        'assets/js/components/hs.onscroll-animation.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class,
        UnifyAppearAsset::class
    ];
}