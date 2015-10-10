<?php

namespace worstinme\uikit;

use yii\web\AssetBundle;


class UikitAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/uikit.min.css',
        'css/components/form-advanced.min.css',
    ];

    public $js = [
        'js/uikit.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

}