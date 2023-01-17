<?php
namespace common\modules\cms\modules\admin\widgets\gridViewStandart;
use yii\web\AssetBundle;

/**
 * Class GridViewStandartAsset
 * @package common\modules\cms\modules\admin\widgets\gridViewStandart
 */
class GridViewStandartAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/admin/widgets/gridViewStandart';

    public $css = [
    ];
    public $js = [
        'js/gridViewStandart.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        '\common\modules\cms\modules\sx\assets\Custom',
        '\common\modules\cms\modules\sx\assets\ComponentAjaxLoader',
    ];
}
