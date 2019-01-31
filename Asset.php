<?php
/**
 * This file is part of the yii2-uikit project.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 * @copyright yii2-uikit (c) 2018
 * @author Eugene Zakirov (worstinme) <box@flyleaf.su>
 */

namespace worstinme\uikit;

use yii\web\AssetBundle;

class Asset extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public $sourcePath = '@bower/uikit/dist';

    /**
     * {@inheritdoc}
     */
    public $css = [
        'css/uikit.min.css',
    ];

    /**
     * {@inheritdoc}
     */
    public $js = [
        'js/uikit.min.js',
    ];

    /**
     * {@inheritdoc}
     */
    public $depends = [

    ];

}