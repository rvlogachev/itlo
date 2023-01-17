<?php

namespace common\modules\cms\modules\assetsunifyv2min\base;

use yii\web\YiiAsset;

/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyFancyboxAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/fancybox/jquery.fancybox.min.css',
    ];

    public $js = [
        'assets/vendor/fancybox/jquery.fancybox.min.js',
    ];

    public $depends = [
        YiiAsset::class,
    ];
}