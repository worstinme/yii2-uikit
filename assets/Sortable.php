<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Sortable extends AssetBundle
{
    public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/components/sortable.min.css',
    ];

    public $js = [
        'js/components/sortable.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}