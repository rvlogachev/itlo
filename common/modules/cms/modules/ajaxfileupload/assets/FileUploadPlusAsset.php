<?php
namespace common\modules\cms\modules\ajaxfileupload\assets;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class FileUploadPlusAsset extends \dosamigos\fileupload\FileUploadPlusAsset
{
    public $publishOptions = [
        'except' => [
            'server/*',
            'test'
        ],
    ];
}