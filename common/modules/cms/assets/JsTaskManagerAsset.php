<?php
namespace common\modules\cms\assets;

use common\modules\cms\base\AssetBundle;

/**
 * Class JsTaskManagerAsset
 * @package skeeks\cms\assets
 */
class JsTaskManagerAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/assets/src';

    public $css = [
    ];

    public $js = [
        'classes/tasks/Task.js',
        'classes/tasks/AjaxTask.js',
        'classes/tasks/ProgressBar.js',
        'classes/tasks/Manager.js',
    ];

    public $depends = [
        '\common\modules\cms\modules\sx\assets\Custom',
    ];
}
