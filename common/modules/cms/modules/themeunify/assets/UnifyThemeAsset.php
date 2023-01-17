<?php
namespace common\modules\cms\modules\themeunify\assets;

use  common\modules\cms\modules\assetsunifyv2min\base\UnifyAsset;
use  common\modules\cms\modules\assetsunifyv2min\base\UnifyHsCarouselAsset;
use  common\modules\cms\modules\assetsunifyv2min\base\UnifyHsHamburgersAsset;
use  common\modules\cms\modules\assetsunifyv2min\base\UnifyHsMegamenuAsset;
use   common\modules\cms\modules\assetsunifyv2min\base\UnifyHsOnscrollAnimationAsset;
use  common\modules\cms\modules\assetsunifyv2min\base\UnifyHsPopupAsset;
use   common\modules\cms\modules\assetsunifyv2min\base\UnifyHsStickyBlockAsset;
use  common\modules\cms\modules\sx\assets\Custom;
use skeeks\cms\themes\unify\assets\UnifyDefaultAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeAsset extends UnifyAsset
{
    public $sourcePath = "@skeeks/cms/themes/unify/assets/src";

    public $css = [
        'css/unify-custom.css',
    ];

    public $js = [
        'js/unify-custom.js',
    ];

    public $depends = [
        UnifyDefaultAsset::class,

        //UnifyHsMegamenuAsset::class,
        //UnifyHsHamburgersAsset::class,
        UnifyHsPopupAsset::class,
        UnifyHsOnscrollAnimationAsset::class,
        //UnifyHsStickyBlockAsset::class,
        //UnifyHsCarouselAsset::class,
    ];
}