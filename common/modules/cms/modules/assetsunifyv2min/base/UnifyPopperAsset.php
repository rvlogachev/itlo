<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

use yii\web\YiiAsset;

/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyPopperAsset extends UnifyAsset
{
    public $css = [
    ];

    public $js = [
        'assets/vendor/popper.js/popper.min.js',
    ];

    public $depends = [
        YiiAsset::class,
    ];
}