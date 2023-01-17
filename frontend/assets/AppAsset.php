<?php

namespace frontend\assets;

/**
 * Class AppAsset
 * @package frontend\assets
 */
class AppAsset extends \common\modules\cms\base\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/phone.css',
        'css/app.css',

    ];
    public $js = [
        'smarty/js/scripts.js',
        'js/app1.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        '\common\modules\cms\modules\sx\assets\Custom',
        '\common\modules\cms\assets\FancyboxAssets',
        '\common\assets\BoomerangThemeAsset',
    ];
}