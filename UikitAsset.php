<?php

namespace worstinme\uikit;

use yii\web\AssetBundle;


class UikitAsset extends AssetBundle
{
    public $sourcePath = '@vendor/uikit/uikit/src/less';

    public $css = [
        'css/uikit.less',
        'css/components/form-advanced.less',
    ];

    public $js = [
        'js/uikit.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];

}