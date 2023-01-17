<?php
namespace common\modules\cms\modules\ajaxpager\assets;

use yii\web\AssetBundle;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @deprecated
 */
class SimplePaginationAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/ajaxpager/assets/src/simplePagination';

    public $css = [
        'simplePagination.css',
    ];
    public $js = [
        'jquery.simplePagination.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

