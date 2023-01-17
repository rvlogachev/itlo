<?php
namespace frontend\assets;

use skeeks\template\smarty\SmartyAsset;

/**
 * Class OwnCarouselAsset
 *
 * @package frontend\assets
 */
class OwnCarouselAsset extends AppAsset
{

    public $css = [];

    public $js = [
        'js/classes/OwnCarousel.js',
    ];

    public $depends = [
        '\frontend\assets\OwnCarouselSmartyAsset',
    ];

}