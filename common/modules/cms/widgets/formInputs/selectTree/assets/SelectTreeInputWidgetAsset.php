<?php
namespace common\modules\cms\widgets\formInputs\selectTree\assets;

use yii\web\AssetBundle;

/**
 * Class SelectTreeInputWidgetAsset
 *
 * @package skeeks\cms\widgets\formInputs\selectTree\assets
 */
class SelectTreeInputWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/widgets/formInputs/selectTree/assets/src';

    public $css = [
        'css/select-tree.css',
    ];

    public $js = [
        'js/select-tree.js',
    ];

    public $depends = [
        'common\modules\cms\modules\sx\assets\Core',
    ];
}
