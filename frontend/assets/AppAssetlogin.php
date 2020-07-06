<?php

namespace frontend\assets;

use yii\web\AssetBundle;
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 9/25/2018
 * Time: 4:02 PM
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
//        'css/search.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
