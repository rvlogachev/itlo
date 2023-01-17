<?php
namespace common\modules\backend\widgets\assets;
use yii\web\AssetBundle;

/**
 * Class ControllerActionsWidgetAsset
 *
 * @package common\modules\cms\backend\widgets
 */
class ControllerActionsWidgetAsset extends AssetBundle
{

    public $sourcePath = '@common/modules/backend/widgets/assets/src';

    public $css = [
    ];
    public $js = [
        'js/controller-actions-widget.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Custom',
    ];
}
