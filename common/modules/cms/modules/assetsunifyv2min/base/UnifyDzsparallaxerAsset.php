<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

use yii\web\YiiAsset;

/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyDzsparallaxerAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/dzsparallaxer/dzsparallaxer.css',
        'assets/vendor/dzsparallaxer/dzsscroller/scroller.css',
        'assets/vendor/dzsparallaxer/advancedscroller/plugin.css'
    ];

    public $js = [
        'assets/vendor/dzsparallaxer/dzsparallaxer.js',
        'assets/vendor/dzsparallaxer/dzsscroller/scroller.js',
        'assets/vendor/dzsparallaxer/advancedscroller/plugin.js',
    ];

    public $depends = [
        YiiAsset::class,
    ];
}