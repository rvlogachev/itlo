<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 *
 * $(window).on('load', function () {
      // initialization of header
      $.HSCore.helpers.HSHamburgers.init('.hamburger');
    });
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsHamburgersAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/hamburgers/hamburgers.min.css'
    ];

    public $js = [
        'assets/js/helpers/hs.hamburgers.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class
    ];
}