<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Upload extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/placeholder.css',
        'css/components/progress.css',
        'css/components/form-file.css',
    ];

    public $js = [
        'js/components/upload.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}