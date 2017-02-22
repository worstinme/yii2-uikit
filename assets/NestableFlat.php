<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class NestableFlat extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/nestable.almost-flat.css',
    ];

    public $js = [
        'js/components/nestable.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}