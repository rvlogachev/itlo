<?php
namespace common\modules\cms\modules\ajaxfileupload\widgets\assets;

use yii\web\AssetBundle;

/**
 * Class AjaxFileUploadWidgetAsset
 *
 * @package common\modules\cms\modules\ajaxfileupload\widgets\assets
 */
class AjaxFileUploadWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/ajaxfileupload/widgets/assets/src';

    public $css = [
        'css/ajax-file-upload.css',
    ];

    public $js = [
        'js/ajax-file-upload.js',
        'js/ajax-file-upload-tool.js',
        'js/ajax-file-upload-file.js',
        'js/tools/tool-remote-upload.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Custom',
    ];

    /**
     * @param string $asset
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    static public function getAssetUrl($asset)
    {
        return \Yii::$app->assetManager->getAssetUrl(\Yii::$app->assetManager->getBundle(static::className()), $asset);
    }
}