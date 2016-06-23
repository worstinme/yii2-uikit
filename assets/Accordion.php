<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Accordion extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/accordion.min.css',
    ];

    public $js = [
        'js/components/accordion.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}