<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

use yii\web\YiiAsset;

/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyMasonryAsset extends UnifyAsset
{
    public $css = [
    ];

    public $js = [
        'assets/vendor/masonry/dist/masonry.pkgd.min.js',
    ];

    public $depends = [
        YiiAsset::class,
    ];
}