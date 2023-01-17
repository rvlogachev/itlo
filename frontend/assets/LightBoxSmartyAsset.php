<?php
namespace frontend\assets;

use skeeks\template\smarty\SmartyAsset;

/**
 * Class LightBoxSmartyAsset
 *
 * @package frontend\assets
 */
class LightBoxSmartyAsset extends SmartyAsset
{
    public $css = [];

    public $js = [
        'plugins/magnific-popup/jquery.magnific-popup.min.js',
    ];

    public $depends = [
        '\frontend\assets\AppAsset',
    ];
}