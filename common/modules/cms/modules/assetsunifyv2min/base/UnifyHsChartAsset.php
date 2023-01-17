<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\assets\unify\base;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsChartAsset extends UnifyAsset
{

    public $js = [
        'assets/vendor/circles/circles.min.js',
        'assets/js/components/hs.chart-pie.js'
    ];

    public $depends = [
        UnifyHsCoreAsset::class,
        UnifyAppearAsset::class
    ];
}