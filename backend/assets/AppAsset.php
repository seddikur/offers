<?php

namespace backend\assets;

use bestyii\bootstrap\icons\assets\BootstrapIconAsset;
use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/ModalRemote.js',
        'js/ajaxcrud.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap4\BootstrapAsset',
        BootstrapIconAsset::class
    ];
}
