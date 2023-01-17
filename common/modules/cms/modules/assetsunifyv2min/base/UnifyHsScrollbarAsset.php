<?php

namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 *
 * $.HSCore.components.HSScrollBar.init($('.js-scrollbar'))
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsScrollbarAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css'
    ];

    public $js = [
        'assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js',
        'assets/js/components/hs.scrollbar.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class
    ];
}