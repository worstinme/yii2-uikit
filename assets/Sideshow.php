<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Slideshow extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/slideshow.min.css',
        'css/components/slidenav.min.css',
    ];

    public $js = [
        'js/components/slideshow.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}