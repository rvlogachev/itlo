<?php

namespace frontend\assets;

/**
 * Class AppAsset
 * @package frontend\assets
 */
class CryptoparrotAsset extends \common\modules\cms\base\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
//    public $sourcePath = '@frontend/assets/cryptoparrot';

    public $css = [
        'cryptoparrot/css/style.css',
//        'css/app.css',

    ];
    public $js = [
//        'smarty/js/scripts.js',
//        'js/app1.js',
        'cryptoparrot/js/etherium.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
//        '\common\modules\cms\modules\sx\assets\Custom',
//        '\common\modules\cms\assets\FancyboxAssets',
//        '\common\assets\BoomerangThemeAsset',
    ];
}