<?php
namespace common\modules\cms\modules\backend\assets;

use common\modules\cms\base\AssetBundle;

/**
 * Class JqueryScrollbarAsset
 * @package skeeks\cms\admin\assets
 */
class JqueryScrollbarAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/backend/assets/src/plugins/jquery.scrollbar/';

    public $css = [
        'jquery.scrollbar.css',
    ];
    public $js = [
        'jquery.scrollbar.min.js',
    ];
    public $depends = [];
}
