<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\modules\bot\assets;

use common\assets\Html5shiv;
use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Frontend application asset
 */
class ScreensAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@common/modules/bot/assets/screensassets';

    /**
     * @var array
     */
    public $css = [

        'css/mobile/ipad-land-pc.css',
        'css/webbot.css'
    ];

    /**
     * @var array
     */
    public $js = [

        //'js/main.js',
        'js/md5.js'
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
    ];


    public function init()
    {

        $this->cssOptions = ['position' => \yii\web\View::POS_HEAD];
        $this->jsOptions = ['position' => \yii\web\View::POS_BEGIN];

        parent::init();
    }

}

