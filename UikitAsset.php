<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace worstinme\uikit;

use yii\web\AssetBundle;

/**
 * Asset bundle for the Twitter bootstrap css files.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UikitAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/uikit';
    public $css = [
        'css/uikit.css',
    ];
}
