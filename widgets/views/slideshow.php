<?php

use yii\helpers\Html;

\worstinme\uikit\assets\Slideshow::register($this);

$params = [];

if ($this->context->height !== null) {
	$params['height'] = $this->context->height;
}

$params = \yii\helpers\Json::encode($params);

?>
<div class="uk-slidenav-position" data-uk-slideshow='<?=$params?>' data-uk-check-display>
    <ul class="uk-slideshow">
	<?php foreach ($items as $key => $item): ?>
		<li>
			<?php if (!empty($item['img'])): ?>
				<?=Html::img($item['img'])?>
			<?php endif ?>
			<?php if (!empty($item['overlay'])): ?>
				<div class="uk-overlay-panel uk-overlay-background uk-overlay-fade"><?=$item['overlay']?></div>
			<?php endif ?>
			<?php if (!empty($item['item'])): ?>
				<div class="uk-panel"><?=$item['item']?></div>
			<?php endif ?>
		</li>
	<?php endforeach ?>
    </ul>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
	    <?php foreach ($items as $key => $item): ?>
			<li data-uk-slideshow-item="<?=$key?>"><a href=""></a></li>
		<?php endforeach ?>
    </ul>
</div>