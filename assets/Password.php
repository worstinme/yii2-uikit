<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Password extends AssetBundle
{
    public $sourcePath = '@worstinme/uikit/uikit';

    public $css = [
        'css/components/form-password.min.css',
    ];

    public $js = [
        'js/components/form-password.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}