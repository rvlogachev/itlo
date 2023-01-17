<?php
namespace common\assets;

use common\modules\cms\modules\boomerang\BoomerangAsset;
/**
 * Class SmartyThemeAsset
 * @package frontend\assets
 */
class BoomerangThemeAsset extends BoomerangAsset
{
    public $css = [
        'font-awesome/css/font-awesome.min.css',
        'css/global-style.css',
        'assets/layerslider/css/layerslider.css',
    ];

    public $js = [
        'assets/layerslider/js/greensock.js',
        'assets/layerslider/js/layerslider.transitions.js',
        'assets/layerslider/js/layerslider.kreaturamedia.jquery.js',
    ];
}