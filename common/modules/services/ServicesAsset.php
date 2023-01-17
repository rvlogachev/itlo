<?php

namespace common\modules\services;
use yii\web\AssetBundle;

class ServicesAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/services/assets';
    public $css = [
        'css/services.css',
    ];

    public function init()
    {
        parent::init();
    }
}

?>