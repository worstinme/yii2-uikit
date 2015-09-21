<?php

namespace worstinme\uikit;

use Yii;
use yii\helpers\Html;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\widgets\ActiveFormAsset;

class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @var string the default field class name when calling [[field()]] to create a new field.
     * @see fieldConfig
     */
    public $fieldClass = 'worstinme\uikit\ActiveField';
    /**
     * @var array HTML attributes for the form tag. Default is `['role' => 'form']`.
     */
    public $options = ['role' => 'form'];
    /**
     * @var string the form layout. Either 'default', 'horizontal' or 'inline'.
     * By choosing a layout, an appropriate default field configuration is applied. This will
     * render the form fields with slightly different markup for each layout. You can
     * override these defaults through [[fieldConfig]].
     * @see \yii\bootstrap\ActiveField for details on Bootstrap 3 field configuration
     */
    public $layout = 'default';

    public $validate_scripts = true;
    public $validate_scripts_inform = false;

    
    public function run()
    {
        if (!empty($this->_fields)) {
            throw new InvalidCallException('Each beginField() should have a matching endField() call.');
        }
        if ($this->enableClientScript) {
            $id = $this->options['id'];
            $options = Json::htmlEncode($this->getClientOptions());
            $attributes = Json::htmlEncode($this->attributes);
            $view = $this->getView();
            ActiveFormAsset::register($view);
            if ($this->validate_scripts) {
            
                if ($this->validate_scripts_inform) {
                    echo "<script type=\"text/javascript\">jQuery(document).ready(function () { jQuery('#$id').yiiActiveForm($attributes, $options);});</script>";
                }
                else {
                    $view->registerJs("jQuery('#$id').yiiActiveForm($attributes, $options);");
                }

            }
        }
        echo Html::endForm();
    }
 
    /**
     * @inheritdoc
     */
    public function init()
    {
        if (!in_array($this->layout, ['default', 'horizontal', 'inline'])) {
            throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
        }

        $classes = ['default'=>' uk-form-stacked', 'horizontal'=>' uk-form-horizontal', 'inline'=>' uk-form-inline'];
            Html::addCssClass($this->options, 'uk-form' .  $classes[$this->layout]);
        parent::init();
    }
}