<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Slideset extends AssetBundle
{
     public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/components/slidenav.min.css',
        'css/components/dotnav.min.css',
    ];

    public $js = [
        'js/components/slideset.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}