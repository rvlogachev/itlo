<?php

namespace common\modules\admin;
use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/admin/assets';

    public $publishOptions = [
        'forceCopy' => YII_ENV_DEV ? true : false
    ];

    public $js = [
        'js/sticky-sidebar.js',
        'js/helper.js',
        'js/admin.js'
    ];

    public $css = [
        'css/admin.css'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'yii\bootstrap4\BootstrapAsset'
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );

    public function init()
    {
        parent::init();

        \Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = [
            'sourcePath' => $this->sourcePath,
            'js' => [
                YII_ENV_DEV ? 'js/jquery.js' : 'js/jquery.min.js',
                YII_ENV_DEV ? 'js/helper.js' : 'js/helper.min.js'
            ]
        ];

        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'] = [
            'sourcePath' => $this->sourcePath,
            'js' => [
                YII_ENV_DEV ? 'js/bootstrap.js' : 'js/bootstrap.min.js',
                YII_ENV_DEV ? 'js/admin.js' : 'js/admin.min.js'
            ]
        ];

        \Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'sourcePath' => $this->sourcePath,
            'css' => [
                YII_ENV_DEV ? 'css/admin.css' : 'css/admin.min.css'
            ]
        ];

    }
}

?>