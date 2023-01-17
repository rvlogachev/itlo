<?php
namespace frontend\assets;

use skeeks\template\smarty\SmartyAsset;

/**
 * Class ZoomAsset
 *
 * @package frontend\assets
 */
class ZoomAsset extends AppAsset
{
    public $css = [];

    public $js = [
        'js/classes/Zoom.js',
    ];

    public $depends = [
        '\frontend\assets\ZoomSmartyAsset',
    ];
}