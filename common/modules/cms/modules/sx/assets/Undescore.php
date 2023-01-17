<?php
namespace common\modules\cms\modules\sx\assets;
use yii\web\AssetBundle;
/**
 * Class UndescoreAsset
 * @package skeeks\sx
 */
class Undescore extends AssetBundle
{
    public $sourcePath = '@bower/underscore';
    public $js = [
        'underscore-min.js',
    ];
}
