<?php
namespace frontend\assets;
/**
 * Class AppAsset
 *
 * @package frontend\assets
 */
class CartAsset extends AppAsset
{
    public $css = [];
    public $js = [
        'js/classes/Shop.js',
    ];
    public $depends = [
        '\frontend\assets\AppAsset',
        '\common\modules\cms\modules\shop\assets\ShopAsset',
    ];
}