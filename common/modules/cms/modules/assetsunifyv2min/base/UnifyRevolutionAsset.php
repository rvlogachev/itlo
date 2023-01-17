<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\assets\unify\base;

use yii\web\YiiAsset;
/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyRevolutionAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/revolution-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css',
        'assets/vendor/revolution-slider/revolution/css/settings.css',
        'assets/vendor/revolution-slider/revolution/css/layers.css',
        'assets/vendor/revolution-slider/revolution/css/navigation.css',
    ];

    public $js = [
        'assets/vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js',
        'assets/vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js',
    ];

    public $depends = [
        YiiAsset::class
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $appendTimestamp = \Yii::$app->assetManager->appendTimestamp;
        \Yii::$app->assetManager->appendTimestamp = false;

        $href = self::getAssetUrl('assets/vendor/revolution-slider/revolution/fonts/revicons/revicons.woff?5510888');
        \Yii::$app->view->registerLinkTag([
            'rel' => 'preload', 'href' => $href, 'as' => 'font', 'type' => 'font/woff', 'crossorigin' => 'crossorigin'
        ]);
        $href = self::getAssetUrl('assets/vendor/revolution-slider/revolution/fonts/pe-icon-7-stroke/fonts/Pe-icon-7-stroke.woff?d7yf1v');
        \Yii::$app->view->registerLinkTag([
            'rel' => 'preload', 'href' => $href, 'as' => 'font', 'type' => 'font/woff', 'crossorigin' => 'crossorigin'
        ]);

        \Yii::$app->assetManager->appendTimestamp = $appendTimestamp;
    }
    
}