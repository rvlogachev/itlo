<?php
namespace frontend\assets;

use skeeks\template\smarty\SmartyAsset;

/**
 * Class OwnCarouselAsset
 *
 * @package frontend\assets
 */
class OwnCarouselSmartyAsset extends SmartyAsset
{
    public $css = [];

    public $js = [
        'plugins/owl-carousel/owl.carousel.min.js',
    ];

    public $depends = [
        '\frontend\assets\AppAsset',
    ];
}