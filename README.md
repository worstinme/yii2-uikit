# Uikit 3 extensions for Yii2

Widgets & assets for a lightweight and modular front-end framework [UiKit](http://getuikit.com/) 


Installation of yii2-uikit Extension
------------------------------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).
You have to set in your project's composer.json to use this package, because of Uikit 3 RC version.

```json
"minimum-stability": "dev",
"prefer-stable":true,
```
After this settings, just run
```
composer require --prefer-dist worstinme/yii2-uikit:"dev-master"
```
or add
```
"worstinme/yii2-uikit": "dev-master"
```
to the require section of your `composer.json` file and start update

Assets usage exaple:
-------------

For example, including main UiKit css & js files in any view files

```php
\worstinme\uikit\Asset::register($this);
\worstinme\uikit\IconAsset::register($this);
```

Activeform improvements examples:
-------------

Horizontal (or stacked) layout for ActiveForm

```php
$form = ActiveForm::begin([
    'layout'=>horizontal,
]);
```

To get a column layout in grid mode you can modify those options

```php
$form = ActiveForm::begin([
    'grid'=>true,
    'options'=>['class'=>'uk-child-width-1-2@m uk-form-small uk-grid-match'],
    'fieldConfig' => [
        'width' => "1-3@m"
    ],
]);
```
Different options for single field

```php
$form->field($model,'attribute',['width'=>'auto@m']);
```

ActiveField additional methods:
---------------
The code below will generate (?) question icon, placed after label text, with information showed with uk-tooltip 
```php
$form->field($model,'attribute')->label('label')->info('Additional info to the label of this field');
```
This will generate <i uk-icon="lock"></i> inside input field 
```php
$form->field($model,'attribute')->icon('lock');
```
Icon can be placed in the right side of input field or changed by not uikit icon by this settings
```php
$form->field($model,'attribute')->icon('<i class="fas fa-user"></i>',['flip'=>true,'uikit'=>false,'tag'=>'a','href'=>'http://example.com']);
```