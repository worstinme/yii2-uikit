# yii2-uikit extensions for Yii2

Widgets & assets for a lightweight and modular front-end framework [UiKit](http://getuikit.com/) 


Installation of Yii2 Uikit3 Extension
------------------------------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). Just run

You have to set in your project's composer.json to use this package, because of Uikit 3 RC version.

```json
{
    ...
    "minimum-stability": "dev",
    "prefer-stable":true,
    ...
}
    
```


```
composer require --prefer-dist worstinme/yii2-uikit:"dev-master"
```
or add

```
"worstinme/yii2-uikit": "dev-master"
```
to the require section of your `composer.json` file.


Usage exaple:
-------------

For example, including main UiKit css & js files in any view files

```php
\worstinme\uikit\Asset::register($this);
```