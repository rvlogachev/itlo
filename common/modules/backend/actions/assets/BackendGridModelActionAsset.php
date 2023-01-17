<?php
namespace common\modules\backend\actions\assets;

use common\modules\cms\base\AssetBundle;
use yii\bootstrap\BootstrapAsset;

/**
 * Class SelectLanguage
 * @package common\widgets\selectLanguage
 */
class BackendGridModelActionAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/backend/actions/assets/src';

    public $css = [
    ];

    public $js = [
        'filters.js',
    ];

    public $depends =
    [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Custom',
        'common\modules\cms\modules\sx\assets\ComponentAjaxLoader',
        'common\modules\backend\assets\BackendAsset',
    ];
}