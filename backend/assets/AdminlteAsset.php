<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 3:14 PM
 */

namespace backend\assets;

use common\assets\AdminLte;
use common\assets\BoomerangThemeAsset;
use common\assets\Html5shiv;
use common\modules\cms\assets\FancyboxAssets;
use common\modules\cms\modules\sx\assets\Custom;
use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\JqueryAsset;
use yii\web\YiiAsset;
use rmrevin\yii\fontawesome\NpmFreeAssetBundle;

class AdminlteAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@backend/assets/adminlte/';

    /**
     * @var array
     */
    public $css = [
        'css/phone.css',
       // 'css/app.css',
        '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'plugins/fontawesome-free/css/all.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'plugins/jqvmap/jqvmap.min.css',
//        'css/adminlte.min.css',
        'plugins/overlayScrollbars/css/OverlayScrollbars.min.css',
        'plugins/daterangepicker/daterangepicker.css',
        'plugins/summernote/summernote-bs4.min.css'

    ];

    /**
     * @var array
     */
    public $js = [

        'plugins/jquery-ui/jquery-ui.min.js',
//        'plugins/chart.js/Chart.min.js',
//        'plugins/sparklines/sparkline.js',
//        'plugins/jqvmap/jquery.vmap.min.js',
//        'plugins/jqvmap/maps/jquery.vmap.usa.js',
//        'plugins/jquery-knob/jquery.knob.min.js',
//        'plugins/moment/moment.min.js',
//        'plugins/daterangepicker/daterangepicker.js',
//        'plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
//        'plugins/summernote/summernote-bs4.min.js',
//        'plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js',
 //       'js/adminlte.js',
        'js/demo.js',
       // 'js/app1.js',
        'smarty/js/scripts.js',
//        'js/pages/dashboard.js',
    ];

    /**
     * @var array
     */
    public $depends = [
         YiiAsset::class,
         Custom::class,
         FancyboxAssets::class,
         BoomerangThemeAsset::class,
         BootstrapAsset::class,
         BootstrapPluginAsset::class,
         AdminLte::class,
         Html5shiv::class,
    ];

}
