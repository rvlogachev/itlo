<?php
namespace common\modules\cms\modules\themeunifyv2\assets;

use yii\web\AssetBundle;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome/';
    public $css = [
        'css/all.min.css',
    ];
}