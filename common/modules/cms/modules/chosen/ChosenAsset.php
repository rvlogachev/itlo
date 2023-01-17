<?php
namespace common\modules\cms\modules\chosen;

use yii\web\AssetBundle;

/**
 * Class ChosenAsset
 * @package skeeks\widget\chosen
 */
class ChosenAsset extends AssetBundle
{
    public $sourcePath = '@bower/chosen';

    public $js = [
        'chosen.jquery.min.js'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
