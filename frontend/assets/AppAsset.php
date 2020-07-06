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
        'css/bootstrap.main.css',
        'css/fontawesome-all.min.css',
        'css/lightbox.css',
        'css/site.css',
        'css/frontend.css',
        'datePicker/kamadatepicker.min.css',
        'datePicker/kamadatepicker.css',
        'datePicker/datepicker.css',
        'css/jquery-ui.css',
        'css/datepicker (2).css',

    ];
    public $js = [
        'datePicker/bootstrap-datepicker.fa.min.js',
        'datePicker/bootstrap-datepicker.min.js',
        'datePicker/datepicker.js',
        'js/bootstrap.min.js',
//        'js/owl.carousel.min.js',
//        'js/jquery-2.2.3.min.js',
        'js/myjs.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
