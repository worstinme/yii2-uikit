<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Notify extends AssetBundle
{
    public $sourcePath = '@vendor/uikit/uikit';

    public $css = [
        'css/components/notify.min.css',
    ];

    public $js = [
        'js/components/notify.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}