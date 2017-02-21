<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Slideset extends AssetBundle
{
     public $sourcePath = '@vendor/uikit/uikit';

    public $css = [
        'css/components/slidenav.min.css',
    ];

    public $js = [
        'js/components/slideset.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}