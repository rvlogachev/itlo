<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\assets\unify\base\revolution;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyRevolutionAsset;
/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyRevolutionAddonParticlesAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/revolution-slider/revolution-addons/particles/css/revolution.addon.particles.css',
    ];

    public $js = [
        'assets/vendor/revolution-slider/revolution-addons/particles/js/revolution.addon.particles.min.js',
    ];

    public $depends = [
        UnifyRevolutionAsset::class
    ];
}