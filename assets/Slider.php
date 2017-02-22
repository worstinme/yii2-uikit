<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Slider extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/slidenav.css',
        'css/components/slider.css',
        'css/components/dotnav.css',
    ];

    public $js = [
        'js/components/slider.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}