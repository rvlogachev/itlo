<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

use yii\web\JqueryAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsCoreAsset extends UnifyAsset
{
    public $css = [];

    public $js = [
        'assets/js/hs.core.js',
    ];

    public $depends = [
        JqueryAsset::class
    ];
}