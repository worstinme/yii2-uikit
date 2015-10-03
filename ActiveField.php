<?php

namespace worstinme\uikit;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class ActiveField extends \yii\widgets\ActiveField
{
	public $template = "{label}\n<div class=\"uk-form-controls\">{input}\n{error}\n{hint}\n</div>\n";

	public $labelOptions = ['class' => 'uk-form-label'];

	public $options = ['class' => 'uk-form-row'];

	public $errorOptions = ['class' => 'uk-form-help-block uk-text-danger'];

	public $hintOptions = ['class' => 'uk-form-help-block'];    

	public function begin()
    {

        $attribute = Html::getAttributeName($this->attribute);
        
        if ($this->model->hasErrors($attribute)) {
            $this->inputOptions['class'] .= ' uk-form-danger';
        }

        return parent::begin();
    }


    public function checkbox($options = [], $enclosedByLabel = true)
    {
        return parent::checkbox($options, $enclosedByLabel);
    }

}