<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Accordion extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/accordion.css',
    ];

    public $js = [
        'js/components/accordion.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}