<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Upload extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit/src';

    public $css = [
        'css/components/placeholder.min.css',
        'css/components/progress.min.css',
        'css/components/form-file.min.css',
    ];

    public $js = [
        'js/components/upload.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}