<?php
namespace common\modules\backend\assets;

use common\modules\cms\base\AssetBundle;
use yii\bootstrap\BootstrapAsset;

/**
 * Class SelectLanguage
 * @package common\widgets\selectLanguage
 */
class BackendAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/backend/assets/src';

    public $css = [
        'backend.css',
    ];

    public $js = [
        'backend.js',
    ];

    public $depends =
    [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Custom',
        'common\modules\cms\modules\sx\assets\ComponentAjaxLoader',
    ];
}