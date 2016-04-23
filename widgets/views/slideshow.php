<?php

use yii\helpers\Html;

\worstinme\uikit\assets\Slideshow::register($this);

?>
<div class="uk-slidenav-position" data-uk-slideshow>
    <ul class="uk-slideshow">
	<?php foreach ($images as $key => $image): ?>
		<li><?= Html::img($image); ?></li>
	<?php endforeach ?>
    </ul>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
	    <?php foreach ($images as $key => $image): ?>
			<li data-uk-slideshow-item="<?=$key?>"><a href=""></a></li>
		<?php endforeach ?>
    </ul>
</div>