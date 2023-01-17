<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/3/14
 * Time: 3:14 PM
 */

namespace common\modules\admin\assets;

use common\assets\Html5shiv;
use common\assets\JquerySlimScroll;
use rmrevin\yii\fontawesome\NpmFreeAssetBundle;
use yii\bootstrap4\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

class AdminlteAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@common/modules/admin/assets/adminlte/';

    /**
     * @var array
     */
    public $css = [

        '//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'plugins/fontawesome-free/css/all.min.css',
        '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'plugins/jqvmap/jqvmap.min.css',
        'css/adminlte.min.css',
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
        'js/adminlte.js',
//        'js/demo.js',
//        'js/pages/dashboard.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        YiiAsset::class,
        //BootstrapAsset::class,
        //BootstrapPluginAsset::class,
       // NpmFreeAssetBundle::class,
       // JquerySlimScroll::class,
        Html5shiv::class,
    ];

}
