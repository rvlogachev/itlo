<?php
namespace common\modules\cms\modules\themeunify\assets;

use  common\modules\cms\modules\assetsunifyv2min\base\UnifyAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyJqueryAsset extends UnifyAsset
{
    public $css = [];
    public $js = [
        'assets/vendor/jquery/jquery.min.js',
        'assets/vendor/jquery-migrate/jquery-migrate.min.js',
    ];
    public $depends = [];
}