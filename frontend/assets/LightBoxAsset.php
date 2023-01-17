<?php
namespace frontend\assets;

use skeeks\template\smarty\SmartyAsset;

/**
 * Class LightBoxAsset
 *
 * @package frontend\assets
 */
class LightBoxAsset extends AppAsset
{
    public $css = [];

    public $js = [
        'js/classes/LightBox.js',
    ];

    public $depends = [
        '\frontend\assets\LightBoxSmartyAsset',
    ];
}