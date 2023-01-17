<?php 
namespace common\modules\cms\modules\assetsunifyv2min\base;
 
class UnifyHsGoToAsset extends UnifyAsset
{
    public $css = [
    ];

    public $js = [
        'assets/js/components/hs.go-to.js',
    ];

    public $depends = [
        UnifyHsCoreAsset::class,
    ];
}