<?php

namespace worstinme\uikit\assets;

use yii\web\AssetBundle;

class Notify extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';

    public $css = [
        'css/components/notify.css',
    ];

    public $js = [
        'js/components/notify.min.js',
    ];

    public $depends = [
        'worstinme\uikit\UikitAsset',
    ];
}