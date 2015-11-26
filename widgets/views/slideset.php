<?php

use yii\helpers\Html;

\worstinme\uikit\assets\Slideset::register($this);
\worstinme\uikit\assets\Lightbox::register($this);

$id = uniqid();

if (count($data)): ?>
<div data-uk-slideset="{default:1, small: 2, medium: 4}">
    <div class="uk-slidenav-position">
        <ul class="uk-grid uk-slideset uk-grid-small uk-grid-width-1-2 uk-grid-width-medium-1-4">
            <?php foreach ($data as $d): ?>
            	<li><?=Html::a(Html::img($d['preview']),$d['image'],["data-uk-lightbox"=>"{group:'".$id."'}"])?></li>
            <?php endforeach ?>         
        </ul>
        <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
        <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
    </div>
</div>
<?php endif ?>