<?php
namespace common\modules\cms\widgets\tree\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 * @package skeeks\cms\modules\admin
 */
class CmsTreeWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/widgets/tree/assets/src';

    public $css = [
        'css/style.css',
    ];
    public $js = [
    ];
    public $depends = [
        'common\modules\cms\modules\sx\assets\Core',
    ];
}
