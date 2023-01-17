<?php
namespace common\modules\cms\modules\backend\assets;

/**
 * Class AdminFormAsset
 * @package common\modules\cms\admin\assets
 */
class AdminFormAsset extends AdminAsset
{
    public $css =
        [
            'css/form.css',
        ];

    public $js = [
        'js/classes/Form.js',
    ];

    public $depends =
        [
            //'skeeks\cms\admin\assets\AdminAsset',
            'common\modules\cms\modules\sx\assets\Core',
        ];
}

