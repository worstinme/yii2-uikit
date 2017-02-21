<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Slider extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit/src';

    public $css = [
        'css/components/slidenav.min.css',
        'css/components/slider.min.css',
        'css/components/dotnav.min.css',
    ];

    public $js = [
        'js/components/slider.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}