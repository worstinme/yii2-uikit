<?php
/**
 * This file is part of the anatarus.com project.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 * @copyright anatarus.com (c) 2018
 * @author Eugene Zakirov (worstinme) <box@flyleaf.su>
 */

namespace worstinme\uikit;


class LinkPager extends \yii\widgets\LinkPager
{
    /**
     * {@inheritdoc}
     */
    public $options = [
        'class'=>'uk-pagination uk-flex-center',
    ];

    /**
     * {@inheritdoc}
     */
    public $activePageCssClass = 'uk-active';

    /**
     * {@inheritdoc}
     */
    public $disabledPageCssClass = 'uk-disable';
}