<?php
namespace common\modules\cms\widgets\formInputs\comboText;

use Yii;
use yii\web\AssetBundle;

/**
 * Class ComboTextInputWidgetAsset
 * @package skeeks\cms\widgets\formInputs\comboText
 */
class ComboTextInputWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/widgets/formInputs/comboText/assets';

    public $css = [];

    public $js =
        [
            'combo-widget.js',
        ];

    public $depends = [
        '\common\modules\cms\modules\sx\assets\Core',
    ];
}

