<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Lightbox extends AssetBundle
{
    public $sourcePath = '@vendor/uikit/uikit';

    public $css = [
        
    ];

    public $js = [
        'js/components/lightbox.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}