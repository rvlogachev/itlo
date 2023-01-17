<?php
namespace common\modules\cms\modules\ajaxpager\assets;

use yii\web\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AjaxLinkPagerAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/ajaxpager/assets/src';

    public $js = [
        'AjaxLinkPager.js',
    ];

    public $css = [
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Custom',
        'common\modules\cms\modules\ajaxpager\assets\SimplePaginationAsset',
    ];
}