<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsCarouselAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/slick-carousel/slick/slick.css'
    ];

    public $js = [
        'assets/vendor/slick-carousel/slick/slick.js',
        'assets/js/components/hs.carousel.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class
    ];
}