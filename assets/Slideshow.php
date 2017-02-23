<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Slideshow extends AssetBundle
{
    public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/components/slideshow.min.css',
        'css/components/slidenav.min.css',
        'css/components/dotnav.min.css',
    ];

    public $js = [
        'js/components/slideshow.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}