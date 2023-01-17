<?php
namespace common\modules\cms\modules\simpleajaxuploader;

use yii\web\AssetBundle;

/**
 * Class Core
 * @package common\modules\cms\modules\simpleajaxloader
 */
class Asset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/simpleajaxuploader/assets';
    public $css = [];
    public $js = [
        'SimpleAjaxUploader.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}