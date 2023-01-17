<?php
namespace common\modules\cms\modules\chosen;

use yii\web\AssetBundle;

/**
 * Class ChosenAsset
 * @package skeeks\widget\chosen
 */
class ChosenBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/chosen/assets/chosen-bootstrap-1.1.0';

    public $css = [
        'chosen.bootstrap.min.css',
    ];

    public $depends = [
        'yii\bootstrap4\BootstrapAsset',
        'common\modules\cms\modules\chosen\ChosenAsset',
    ];
}
