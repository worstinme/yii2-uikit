<?php

namespace worstinme\uikit;

use yii\web\AssetBundle;


class UikitAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/uikit.css',
        'css/components/form-advanced.css',
    ];

    public $js = [
        'js/uikit.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

}