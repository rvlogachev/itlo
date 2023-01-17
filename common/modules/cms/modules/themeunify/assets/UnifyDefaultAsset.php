<?php
namespace common\modules\cms\modules\themeunify\assets;

use common\modules\cms\modules\assetsunifyv2min\base\UnifyAppearAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyAsset;
use  common\modules\cms\modules\assetsunifyv2min\base\UnifyDzsparallaxerAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyFancyboxAsset;
use   common\modules\cms\modules\assetsunifyv2min\base\UnifyHsBgVideoAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyHsCarouselAsset;
use  common\modules\cms\modules\assetsunifyv2min\base\UnifyHsGoToAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyHsHamburgersAsset;
use  common\modules\cms\modules\assetsunifyv2min\base\UnifyHsHeaderAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyHsMegamenuAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyHsOnscrollAnimationAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyHsPopupAsset;
use  common\modules\cms\modules\assetsunifyv2min\base\UnifyHsStickyBlockAsset;
use   common\modules\cms\modules\assetsunifyv2min\base\UnifyMasonryAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyPopperAsset;
use  common\modules\cms\modules\sx\assets\Custom;
use common\modules\cms\modules\themeunifyv2\assets\FontAwesomeAsset;
use yii\base\Exception;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyDefaultAsset extends UnifyAsset
{
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik&display=swap',
        //'https://use.fontawesome.com/releases/v5.5.0/css/all.css',
        //'@vendor/fortawesome/font-awesome/css/all.min.css',

        //'assets/vendor/icon-awesome/css/font-awesome.min.css',
        'assets/vendor/icon-hs/style.css',
        /*'assets/vendor/icon-awesome/css/font-awesome.min.css',
        'assets/vendor/icon-line/css/simple-line-icons.css',
        'assets/vendor/icon-etlinefont/style.css',
        'assets/vendor/icon-line-pro/style.css',
        'assets/vendor/icon-hs/style.css',*/
        
        /*'assets/vendor/animate.css',
        'assets/vendor/typedjs/typed.css',*/

        'assets/css/unify-core.css',
        'assets/css/unify-components.css',
        'assets/css/unify-globals.css',
    ];

    public $js = [

    ];

    public $depends = [
        YiiAsset::class,
        Custom::class,
        UnifyPopperAsset::class,
        BootstrapPluginAsset::class,
        FontAwesomeAsset::class,
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $appendTimestamp = \Yii::$app->assetManager->appendTimestamp;
        \Yii::$app->assetManager->appendTimestamp = false;

        $href = self::getAssetUrl('assets/vendor/icon-hs/fonts/hs-icons.ttf?xa77py');
        \Yii::$app->view->registerLinkTag([
            'rel' => 'preload', 'href' => $href, 'as' => 'font', 'type' => 'font/ttf', 'crossorigin' => 'crossorigin'
        ]);
        $href = self::getAssetUrl('assets/vendor/icon-awesome/fonts/fontawesome-webfont.woff2?v=4.7.0');
        \Yii::$app->view->registerLinkTag([
            'rel' => 'preload', 'href' => $href, 'as' => 'font', 'type' => 'font/woff2', 'crossorigin' => 'crossorigin'
        ]);

        $href = self::getAssetUrl('assets/vendor/icon-line/fonts/Simple-Line-Icons.woff2?v=2.4.0');
        \Yii::$app->view->registerLinkTag([
            'rel' => 'preload', 'href' => $href, 'as' => 'font', 'type' => 'font/woff2', 'crossorigin' => 'crossorigin'
        ]);
        $href = self::getAssetUrl('assets/vendor/icon-line-pro/finance/webfont/fonts/finance.woff');
        \Yii::$app->view->registerLinkTag([
            'rel' => 'preload', 'href' => $href, 'as' => 'font', 'type' => 'font/woff', 'crossorigin' => 'crossorigin'
        ]);

        \Yii::$app->assetManager->appendTimestamp = $appendTimestamp;
    }
}