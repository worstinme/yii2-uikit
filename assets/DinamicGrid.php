<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class DinamicGrid extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        
    ];

    public $js = [
        'js'=>'js/components/grid.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}