# yii2-uikit extensions for Yii2

Widgets & assets for a lightweight and modular front-end framework [UiKit](http://getuikit.com/) 


Installation of Yii2 Uikit3 Extension
------------------------------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Just run

```
composer require --prefer-dist worstinme/yii2-uikit:"@dev"
```
or add

```
"worstinme/yii2-uikit": "@dev"
```
to the require section of your `composer.json` file.


Usage exaple:
-------------

For example, including main UiKit css & js files in any view files

```php
\worstinme\uikit\Asset::register($this);
```