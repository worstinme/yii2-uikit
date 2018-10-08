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

class GridView extends \yii\grid\GridView
{
    /**
     * {@inheritdoc}
     */
    public $tableOptions = ['class' => 'uk-table uk-table-striped uk-table-small'];

    /**
     * {@inheritdoc}
     */
    public $pager = [
        'class'=>LinkPager::class
    ];
}