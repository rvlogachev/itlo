<?php
namespace common\modules\cms\modules\sx\assets;

/**
 * Class Core
 * @package skeeks\sx\assets
 */
class Core extends BaseAsset
{
    /**
     * Registers this asset bundle with a view.
     * @param View $view the view to be registered with
     * @return static the registered asset bundle instance
     */
    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $view->registerJs(<<<JS
        (function(sx, $, _){
            sx.init({});
        })(sx, sx.$, sx._);
JS
);
    }

    public $css = [];

    public $js = [
        'js/Skeeks.js',
        'js/Classes.js',
        'js/Entity.js',
        'js/EventManager.js',
        'js/Config.js',
        'js/Component.js',
        'js/Cookie.js',
        'js/Ajax.js',
    ];

    /**
     * @see http://closure-compiler.appspot.com/home
     * @var array
     */
    /*public $js = [
        'distr/skeeks-core.min.js',
    ];*/

    public $depends = [
        'yii\web\YiiAsset',
        'common\modules\cms\modules\sx\assets\Undescore',
    ];
}