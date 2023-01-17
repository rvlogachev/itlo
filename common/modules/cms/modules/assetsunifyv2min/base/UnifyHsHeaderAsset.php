<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 *
 * $(window).on('load', function () {
      // initialization of header
      $.HSCore.components.HSHeader.init($('#js-header'));
    });
 *
 */
class UnifyHsHeaderAsset extends UnifyAsset
{
    public $css = [];

    public $js = [
        'assets/js/components/hs.header.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class
    ];
}