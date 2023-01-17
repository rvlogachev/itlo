<?php
/**
 * JqueryJgrowl
 *
 */
namespace common\modules\cms\modules\sx\assets;
/**
 * Class JquryTmpl
 * @package skeeks\sx\assets
 */
class JqueryJgrowl extends BaseAsset
{
    public $css = [
        'libs/jquery-plugins/jquery-jgrowl/jquery.jgrowl.min.css',
    ];
    public $js = [
        'libs/jquery-plugins/jquery-jgrowl/jquery.jgrowl.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}