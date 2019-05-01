<?php

namespace smart\cms\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/app/dist';

    public $css = [
        'css/site.css',
    ];

    public $js = [
        'js/sidebar.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'smart\cms\assets\FontAwesomeAsset',
    ];
}
