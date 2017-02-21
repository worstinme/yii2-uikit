<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class DinamicGrid extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit/src';

    public $css = [
        
    ];

    public $js = [
        'js/components/grid.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}