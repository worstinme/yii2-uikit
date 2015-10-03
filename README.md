# yii2-uikit

[UiKit](http://getuikit.com/) extensions for Yii2


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist worstinme/yii2-uikit
```

or add

```
"worstinme/yii2-uikit": "*"

```
to the require section of your `composer.json` file.


Usage
----

For example, the following
single line of code in a view file would render a Bootstrap Progress plugin:

```php
<?= worstinme\uikit\Progress::widget(['percent' => 60, 'label' => 'test']) ?>

```
