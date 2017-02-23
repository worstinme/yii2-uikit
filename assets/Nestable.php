<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Nestable extends AssetBundle
{
    public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/components/nestable.min.css',
    ];

    public $js = [
        'js/components/nestable.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}