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

    public function aliasInput($related, $options = [])
    {
        $related_id = '#'.Html::getInputId($this->model, $related);
        $alias_id = '#'.$this->getInputId();

        $view  = $this->form->getView();

        $url = \yii\helpers\Url::toRoute(['alias-create']);

        $script = "$('body').on('change','$related_id',function(){ $.post('$url',{name:$('$related_id').val()},function(data){ if ($('$alias_id').val()) { UIkit.modal.confirm('Replace alias? '+data.alias, function(){ $('$alias_id').val(data.alias) }); } else $('$alias_id').val(data.alias)} )});";

        $view->registerJs($script,$view::POS_READY);
        \worstinme\uikit\assets\Notify::register($view);

        $options = array_merge($this->inputOptions, $options, ['class'=>'uk-form-small uk-form-width-large']);
        $this->adjustLabelFor($options);
        $this->parts['{input}'] = Html::activeTextInput($this->model, $this->attribute, $options);
        return $this;
    }

}