<?php
namespace common\modules\cms\modules\themeunifyv2\assets;

use common\modules\cms\modules\assetsunifyv2min\base\UnifyAsset;
use common\modules\cms\modules\assetsunifyv2min\base\UnifyPopperAsset;
use yii\bootstrap\BootstrapPluginAsset;
use yii\jui\JuiAsset;
class UnifyBootstrapPluginAsset extends BootstrapPluginAsset
{
    public $sourcePath = '@common/modules/cms/modules/assetsunifyv2min/template/html/';

    public $js = [
        /*'assets/vendor/popper.min.js',*/
        'assets/vendor/bootstrap/bootstrap.min.js'
    ];

    //Если грузить в другой последовательности то плохо работают tooltip @see https://stackoverflow.com/questions/13731400/jqueryui-tooltips-are-competing-with-twitter-bootstrap
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        UnifyPopperAsset::class,
        //JuiAsset::class,
    ];
}