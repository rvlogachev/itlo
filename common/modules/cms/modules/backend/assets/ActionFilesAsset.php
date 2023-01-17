<?php
namespace common\modules\cms\modules\backend\assets;

/**
 * Class ActionFilesAsset
 * @package skeeks\cms\admin\assets
 */
class ActionFilesAsset extends AdminAsset
{
    public $css = [
    ];
    public $js =
        [
            'actions/files/files.js',
        ];
    public $depends = [
        '\common\modules\cms\modules\sx\assets\Custom',
        '\common\modules\cms\modules\simpleajaxuploader\Asset',
    ];
}
