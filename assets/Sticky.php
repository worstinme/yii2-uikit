<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Sticky extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/sticky.css',
    ];

    public $js = [
        'js/components/sticky.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}