<?php
namespace common\modules\cms\widgets\assets;

use common\modules\cms\base\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class GridViewAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/widgets/assets/src/grid-view';

    public $css = [
        'grid.css',
        'table.css',
    ];

    public $js = [];

    public $depends = [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Custom',
    ];
}