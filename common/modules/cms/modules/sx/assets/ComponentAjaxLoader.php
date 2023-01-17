<?php
namespace common\modules\cms\modules\sx\assets;
/**
 * Class Helpers
 * @package skeeks\sx\assets
 */
class ComponentAjaxLoader extends BaseAsset
{
    public $css = [
        'js/components/ajax-loader/css/style.css',
    ];
    public $js = [
        'js/components/ajax-loader/AjaxLoader.js',
    ];
    public $depends = [
        'common\modules\cms\modules\sx\assets\Core',
    ];
}