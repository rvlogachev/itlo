<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsMegamenuAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/hs-megamenu/src/hs.megamenu.css'
    ];

    public $js = [
        'assets/vendor/hs-megamenu/src/hs.megamenu.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class
    ];
}