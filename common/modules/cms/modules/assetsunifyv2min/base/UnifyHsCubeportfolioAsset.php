<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\assets\unify\base;

/**
 *
 * $(window).on('load', function () {
 * // initialization of header
 * $.HSCore.components.HSHeader.init($('#js-header'));
 * });
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsCubeportfolioAsset extends UnifyAsset
{
    public $css = [
        'assets/vendor/cubeportfolio-full/cubeportfolio/css/cubeportfolio.min.css',
    ];

    public $js = [
        'assets/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js',
        'assets/js/components/hs.cubeportfolio.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class,
    ];
}