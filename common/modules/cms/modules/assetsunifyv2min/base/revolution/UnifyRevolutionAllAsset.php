<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\assets\unify\base\revolution;

use skeeks\assets\unify\base\revolution\UnifyRevolutionActionsAsset;
use skeeks\assets\unify\base\revolution\UnifyRevolutionCarouselAsset;
use skeeks\assets\unify\base\revolution\UnifyRevolutionKenburnAsset;
use skeeks\assets\unify\base\revolution\UnifyRevolutionLayeranimationAsset;
use skeeks\assets\unify\base\revolution\UnifyRevolutionMigrationAsset;
use skeeks\assets\unify\base\revolution\UnifyRevolutionNavigationAsset;
use skeeks\assets\unify\base\revolution\UnifyRevolutionParallaxAsset;
use skeeks\assets\unify\base\revolution\UnifyRevolutionSlideanimsAsset;
use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyRevolutionAsset;
use yii\web\YiiAsset;
/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyRevolutionAllAsset extends UnifyAsset
{
    public $css = [
    ];

    public $js = [
    ];

    public $depends = [
        UnifyRevolutionAsset::class,
        UnifyRevolutionActionsAsset::class,
        UnifyRevolutionCarouselAsset::class,
        UnifyRevolutionKenburnAsset::class,
        UnifyRevolutionLayeranimationAsset::class,
        UnifyRevolutionMigrationAsset::class,
        UnifyRevolutionNavigationAsset::class,
        UnifyRevolutionParallaxAsset::class,
        UnifyRevolutionSlideanimsAsset::class,
        UnifyRevolutionVideoAsset::class
    ];
}