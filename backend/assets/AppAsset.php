<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        ////<!-- BEGIN GLOBAL MANDATORY STYLES -->
        'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all',
        'common/global/plugins/font-awesome/css/font-awesome.min.css',
        'common/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'common/global/plugins/bootstrap/css/bootstrap.min.css',
        'common/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css',
        ////<!-- END GLOBAL MANDATORY STYLES -->
        ////<!-- BEGIN PAGE LEVEL PLUGINS -->
        'common/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css',
        'common/global/plugins/morris/morris.css',
        'common/global/plugins/fullcalendar/fullcalendar.min.css',
        'common/global/plugins/jqvmap/jqvmap/jqvmap.css',
        ////<!-- END PAGE LEVEL PLUGINS -->
        ////<!-- BEGIN THEME GLOBAL STYLES -->
        'common/global/css/components.min.css',
        'common/global/css/plugins.min.css',
        ////<!-- END THEME GLOBAL STYLES -->
        ////<!-- BEGIN THEME LAYOUT STYLES -->
        'common/layouts/layout/css/layout.min.css',
        'common/layouts/layout/css/themes/default.min.css',
        'common/layouts/layout/css/custom.min.css',
        ////<!-- END THEME LAYOUT STYLES -->
        'favicon.ico'
    ];
    public $js = [
        //<!-- BEGIN CORE PLUGINS -->
        'common/global/plugins/jquery.min.js',
        'common/global/plugins/bootstrap/js/bootstrap.min.js',
        'common/global/plugins/js.cookie.min.js',
        'common/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'common/global/plugins/jquery.blockui.min.js',
        'common/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js',
        //<!-- END CORE PLUGINS -->
        //<!-- BEGIN PAGE LEVEL PLUGINS -->
        'common/global/plugins/moment.min.js',
        'common/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js',
        'common/global/plugins/morris/morris.min.js',
        'common/global/plugins/morris/raphael-min.js',
        'common/global/plugins/counterup/jquery.waypoints.min.js',
        'common/global/plugins/counterup/jquery.counterup.min.js',
        'common/global/plugins/fullcalendar/fullcalendar.min.js',
        'common/global/plugins/flot/jquery.flot.min.js',
        'common/global/plugins/flot/jquery.flot.resize.min.js',
        'common/global/plugins/flot/jquery.flot.categories.min.js',
        'common/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js',
        'common/global/plugins/jquery.sparkline.min.js',
        'common/global/plugins/jqvmap/jqvmap/jquery.vmap.js',
        'common/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js',
        'common/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js',
        'common/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js',
        'common/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js',
        'common/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js',
        'common/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js',
        //<!-- END PAGE LEVEL PLUGINS -->
        //<!-- BEGIN THEME GLOBAL SCRIPTS -->
        'common/global/scripts/app.min.js',
        //<!-- END THEME GLOBAL SCRIPTS -->
        //<!-- BEGIN PAGE LEVEL SCRIPTS -->
        'common/pages/scripts/dashboard.min.js',
        //<!-- END PAGE LEVEL SCRIPTS -->
        //<!-- BEGIN THEME LAYOUT SCRIPTS -->
        'common/layouts/layout/scripts/layout.min.js',
        'common/layouts/layout/scripts/demo.min.js',
        'common/layouts/global/scripts/quick-sidebar.min.js',
        //<!-- END THEME LAYOUT SCRIPTS -->
		'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
