<?php

namespace worstinme\uikit;

use yii\web\AssetBundle;


class UikitAsset extends AssetBundle
{
    public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/uikit.min.css',
        'css/components/form-advanced.min.css',
    ];

    public $js = [
        'js/uikit.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

}