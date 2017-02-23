<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Sticky extends AssetBundle
{
    public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/components/sticky.min.css',
    ];

    public $js = [
        'js/components/sticky.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}