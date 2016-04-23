# yii2-uikit extensions for Yii2

Widgets & assets for a lightweight and modular front-end framework [UiKit](http://getuikit.com/) 


Installation of Yii2 Uikit Extension
------------------------------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Just run

```
php composer.phar require --prefer-dist worstinme/yii2-uikit
```
or add

```
"worstinme/yii2-uikit": "*"
```
to the require section of your `composer.json` file.


Usage exaple:
-------------

For example, including main UiKit css & js files in any view files

```php
\worstinme\uikit\UikitAsset::register($this);
```
Uikit Slideshow widget examples:
 * render slideshow from webroot path with images
```php
<?= worstinme\uikit\widgets\Slideshow::widget(['path' => '/images/somefolder/']) ?>
```
 * render slideshow with custom slides
```php
<?= worstinme\uikit\widgets\Slideshow::widget(['slides' => [
		'<div class="slide">Any content with some <a href="#">button</a> e.g.</div>'
		'<div class="pam_pam_slide-two">Another content with some <a href="#">button</a> e.g.</div>'
	]
]); ?>
```
 * render slideshow with overlays 
```php
<?= worstinme\uikit\widgets\Slideshow::widget(['items' => [
		['img'=>'/link/to/img.jpg','overlay'=>'Any content with some <a href="#">button</a> e.g.'],
		['img'=>'/link/to/img.jpg','overlay'=>'Any content with some <a href="#">button</a> e.g.'],
	]
]); ?>
```