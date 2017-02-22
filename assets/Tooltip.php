<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Tooltip extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/tooltip.css',
    ];

    public $js = [
        'js/components/tooltip.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}