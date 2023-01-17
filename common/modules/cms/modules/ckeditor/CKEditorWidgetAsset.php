<?php
namespace common\modules\cms\modules\ckeditor;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class CKEditorWidgetAsset extends CKEditorAsset
{
    public $depends = [
        'common\modules\cms\modules\ckeditor\CKEditorAsset',
    ];

    public $js = [
        'js/skeeks-ckeditor.widget.js',
    ];
} 