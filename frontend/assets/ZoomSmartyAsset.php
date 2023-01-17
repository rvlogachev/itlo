<?php
namespace frontend\assets;

use skeeks\template\smarty\SmartyAsset;

/**
 * Class ZoomSmartyAsset
 *
 * @package frontend\assets
 */
class ZoomSmartyAsset extends SmartyAsset
{
    public $css = [];

    public $js = [
        'plugins/image.zoom/jquery.zoom.min.js',
    ];

    public $depends = [
        '\frontend\assets\AppAsset',
    ];
}