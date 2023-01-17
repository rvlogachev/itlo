<?php
namespace common\modules\cms\modules\themeunify\admin\assets;

use common\modules\cms\modules\assetsunifyv2min\base\UnifyAsset;
use common\modules\cms\base\AssetBundle;
use skeeks\cms\themes\unify\assets\UnifyThemeAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminUnauthorizedAsset extends UnifyThemeAsset
{
    public $sourcePath = '@skeeks/cms/themes/unify/admin/assets/src/';

    public $css = [
        'css/unauthorized.css',
    ];

    public $js = [
        'js/classes/Blocker.js',
        //'js/app.js',
    ];

    public $depends = [
        UnifyThemeAsset::class,
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