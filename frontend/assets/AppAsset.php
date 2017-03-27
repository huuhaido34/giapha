<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //<!-- Stylesheets
        'http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic',
        'css/bootstrap.css',
        'css/style.css',
        'css/swiper.css',
        'css/dark.css',
        'css/font-icons.css',
        'css/animate.css',
        'css/magnific-popup.css',
        'css/responsive.css',
        'css/bootstrap-select.min.css',
    ];
    public $js = [
        //<!-- External JavaScripts
        'js/jquery.js',
        'js/gojs/go.js',
        'js/plugins.js',
        
        //<!-- Footer Scripts
        'js/functions.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
