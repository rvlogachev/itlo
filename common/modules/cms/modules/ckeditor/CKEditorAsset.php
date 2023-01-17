<?php
namespace common\modules\cms\modules\ckeditor;

use yii\web\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class CKEditorAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/ckeditor/assets';

    public $js = [
        'ckeditor/ckeditor.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    ];
} 