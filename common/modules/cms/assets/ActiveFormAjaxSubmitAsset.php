<?php
/**
 */

namespace common\modules\cms\assets;

use common\modules\cms\base\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class ActiveFormAjaxSubmitAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/assets/src';

    public $css = [
    ];

    public $js = [
        'classes/active-form/AjaxSubmit.js',
    ];

    public $depends = [
        'common\modules\cms\modules\sx\assets\Custom',
    ];
}
