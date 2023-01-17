<?php
namespace common\modules\cms\modules\admin\widgets\filters;

use common\modules\cms\base\AssetBundle;

/**
 * Class SelectLanguage
 * @package common\widgets\selectLanguage
 */
class AdminFiltersFormAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/admin/widgets/filters/assets';

    public $css = [
        'filters-form.css',
    ];

    public $js = [
        'filters-form.js',
    ];

    public $depends =
    [
        'yii\web\YiiAsset',
        '\common\modules\cms\modules\sx\assets\Custom',
        '\common\modules\cms\modules\sx\assets\ComponentAjaxLoader',
    ];
}