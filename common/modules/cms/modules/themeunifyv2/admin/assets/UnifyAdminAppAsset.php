<?php
namespace common\modules\cms\modules\themeunifyv2\admin\assets;

use skeeks\assets\unify\base\UnifyAsset;
use common\modules\cms\base\AssetBundle;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminAppAsset extends AssetBundle
{
    public $sourcePath = '@common/modules/cms/modules/themeunifv2y/admin/assets/src/';

    public $css = [
        'css/custom-theme.css',
        'css/app.css',
    ];

    public $js = [
        //'js/classes/Iframe.js',
        'js/classes/Blocker.js',
        'js/classes/Window.js',

        'js/app.js',
    ];

    public $depends = [
        UnifyAdminAsset::class,
    ];

    /**
     * Registers this asset bundle with a view.
     * @param View $view the view to be registered with
     * @return static the registered asset bundle instance
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $imageLoaderUrl = self::getAssetUrl('img/loader/Ripple-1.5s-163px.svg');
        $view->registerJs(<<<JS
        (function(sx, $, _){
            sx.Config.set('imageLoader', '{$imageLoaderUrl}');
        })(sx, sx.$, sx._);
JS
);
    }

}