<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Nestable extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit/src';

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