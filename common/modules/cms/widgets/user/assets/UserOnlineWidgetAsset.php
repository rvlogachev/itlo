<?php
namespace common\modules\cms\widgets\user\assets;

use common\modules\cms\base\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UserOnlineWidgetAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/widgets/user/assets/src';

    public $css = [
    ];

    public $js = [
    ];

    public $depends = [
        'common\modules\cms\modules\sx\assets\Custom',
    ];
}
