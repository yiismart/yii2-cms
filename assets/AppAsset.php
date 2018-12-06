<?php

namespace smart\cms\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{

    public $css = [
        'site.css',
        'controls.css',
        'sidebar.css',
        'login.css',
    ];

    public $js = [
        'sidebar.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
        'smart\cms\assets\FontAwesomeAsset',
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/app';
    }

}
