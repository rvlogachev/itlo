<?php
namespace common\modules\backend\widgets\assets;
use yii\web\AssetBundle;
/**
 * Class SelectModelDialogWidgetAsset
 *
 * @package skeeks\widget\SelectModelDialog\assets
 */
class SelectModelDialogWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/backend/widgets/assets/src';
    public $css = [
        'css/select-model-dialog.css',
    ];
    public $js =
    [
        'js/select-model-dialog.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Custom',
    ];
}