<?php
/**
 * JqueryBlockUi
 *
 */
namespace common\modules\cms\modules\sx\assets;
/**
 * Class JquryTmpl
 * @package skeeks\sx\assets
 */
class JqueryBlockUi extends BaseAsset
{
    public $css = [];
    public $js = [
        //'libs/jquery-plugins/block-ui/jquery.blockUI.js',
        'libs/jquery-plugins/block-ui/jquery.blockUI.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];

}