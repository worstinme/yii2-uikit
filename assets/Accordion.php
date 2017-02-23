<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Accordion extends AssetBundle
{
    public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/components/accordion.min.css',
    ];

    public $js = [
        'js/components/accordion.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}