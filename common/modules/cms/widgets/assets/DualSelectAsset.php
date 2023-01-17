<?php
namespace common\modules\cms\widgets\assets;

use common\modules\cms\base\AssetBundle;

/**
 * Class DualSelectAsset
 * @package skeeks\cms\assets
 */
class DualSelectAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/widgets/assets/src/dual-select';

    public $css = [
        'dual-select.css'
    ];

    public $js = [
        'dual-select.js',
    ];

    public $depends = [
        'common\modules\cms\modules\sx\assets\Custom',
    ];
}
