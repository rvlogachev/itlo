<?php
namespace common\modules\cms\modules\contextmenu;

use yii\web\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class JqueryContextMenuAsset extends AssetBundle
{
    public $sourcePath = '@npm/jquery-contextmenu/dist';

    public $js = [
        'jquery.contextMenu.min.js',
    ];

    public $css = [
        'jquery.contextMenu.min.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}