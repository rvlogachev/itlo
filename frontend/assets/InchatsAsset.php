<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use common\assets\Html5shiv;
use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Frontend application asset
 */
class InchatsAsset extends AssetBundle
{
    //public $sourcePath = '@frontend/web/bundle';
    public $basePath = '@frontend';
    public $baseUrl = '@web';
    public $css = [

       '/themeassets/plugins/contact-form-7/includes/css/styles.css',
       '/themeassets/plugins/td-composer/td-multi-purpose/style.css',
       '/themeassets/themes/011/style.css',
       '/themeassets/plugins/td-cloud-library/assets/css/tdb_less_front.css'

    ];

    public $js = [


    ];

    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        Html5shiv::class,
    ];

    public function init()
    {

        $this->cssOptions = ['position' => \yii\web\View::POS_HEAD];
        $this->jsOptions = ['position' => \yii\web\View::POS_HEAD];

        parent::init();
    }

}
