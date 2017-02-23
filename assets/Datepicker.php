<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Datepicker extends AssetBundle
{
    public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/components/datepicker.min.css',
    ];

    public $js = [
        'js/components/datepicker.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}