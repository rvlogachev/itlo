<?php
namespace common\modules\cms\modules\themeunifyv2\assets;

use common\modules\cms\modules\assetsunifyv2min\base\UnifyAsset;
use yii\bootstrap\BootstrapAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyBootstrapAsset extends BootstrapAsset
{
    public $sourcePath = '@common/modules/cms/modules/assetsunifyv2min/template/html/';
    public $css = [
        'assets/vendor/bootstrap/bootstrap.min.css',
    ];
}