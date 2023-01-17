<?php
namespace common\modules\cms\modules\ajaxfileupload\widgets\assets;

/**
 * Class AjaxFileUploadDefaultToolAsset
 * @package common\modules\cms\modules\ajaxfileupload\widgets\assets
 */
class AjaxFileUploadRemoteToolAsset extends AjaxFileUploadWidgetAsset
{
    public $css = [];

    public $js = [
        'js/tools/tool-remote-upload.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\ajaxfileupload\assets\FileUploadPlusAsset',
        'common\modules\cms\modules\ajaxfileupload\widgets\assets\AjaxFileUploadWidgetAsset',
    ];
}