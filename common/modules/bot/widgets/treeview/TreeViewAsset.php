<?php
namespace common\modules\bot\widgets\treeview;


use yii\web\AssetBundle;

/**
 * Bower asset for Bootstrap Tree View
 *
 * @author eXeCUT
 */
class TreeViewAsset extends AssetBundle {

    public $sourcePath = '@common/modules/bot/widgets/treeview/dist';
    public $basePath = '@webroot';
    public $js = [
        'bootstrap-treeview.min.js',
    ];

    public $css = [
        'bootstrap-treeview.min.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}