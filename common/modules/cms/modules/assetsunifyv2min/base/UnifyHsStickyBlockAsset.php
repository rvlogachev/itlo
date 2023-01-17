<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsStickyBlockAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/hamburgers/hamburgers.min.css'
    ];

    public $js = [
        'assets/js/components/hs.sticky-block.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class
    ];
}