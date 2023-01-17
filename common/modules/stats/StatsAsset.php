<?php

namespace common\modules\stats;
use yii\web\AssetBundle;

class StatsAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/stats/assets';

    public $css = [
        'css/stats.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();
    }

}

?>