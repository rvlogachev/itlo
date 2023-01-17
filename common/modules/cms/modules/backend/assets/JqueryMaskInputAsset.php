<?php
namespace common\modules\cms\modules\backend\assets;

use common\modules\cms\base\AssetBundle;

/**
 * Class JqueryMaskInputAsset
 * @package skeeks\cms\admin\assets
 */
class JqueryMaskInputAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/backend/assets/src/plugins/jquery.maskedinput';

    public $css = [];

    public $js = [
        'dist/jquery.maskedinput.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
