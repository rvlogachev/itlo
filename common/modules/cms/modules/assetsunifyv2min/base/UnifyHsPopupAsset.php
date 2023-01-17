<?php
namespace common\modules\cms\modules\assetsunifyv2min\base;

/**
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyHsPopupAsset extends UnifyAsset
{
    public $css = [
    ];

    public $js = [
        'assets/js/components/hs.popup.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class,
        UnifyFancyboxAsset::class,
    ];
}