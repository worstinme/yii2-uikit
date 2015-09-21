<?php

namespace worstinme\uikit;

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

class ActiveField extends \yii\widgets\ActiveField
{
    /**
     * @var bool whether to render [[checkboxList()]] and [[radioList()]] inline.
     */
    public $inline = false;
    /**
     * @var string|null optional template to render the `{input}` placeholder content
     */
    public $inputTemplate;
    
    public $helpinline;

    public $wrapperOptions = [];
    /**
     * @var null|array CSS grid classes for horizontal layout. This must be an array with these keys:
     *  - 'offset' the offset grid class to append to the wrapper if no label is rendered
     *  - 'label' the label grid class
     *  - 'wrapper' the wrapper grid class
     *  - 'error' the error grid class
     *  - 'hint' the hint grid class
     */
    public $horizontalCssClasses;
    /**
     * @var string the template for checkboxes in default layout
     */
    public $checkboxTemplate = "<div class=\"checkbox\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>";
    /**
     * @var string the template for radios in default layout
     */
    public $radioTemplate = "<div class=\"radio\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n{error}\n{hint}\n</div>";
    /**
     * @var string the template for checkboxes in horizontal layout
     */
    public $horizontalCheckboxTemplate = "{beginWrapper}\n<div class=\"checkbox\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n</div>\n{error}\n{hint}\n{endWrapper}";
    /**
     * @var string the template for radio buttons in horizontal layout
     */
    public $horizontalRadioTemplate = "{beginWrapper}\n<div class=\"radio\">\n{beginLabel}\n{input}\n{labelTitle}\n{endLabel}\n</div>\n{error}\n{endWrapper}\n{hint}";
    /**
     * @var string the template for inline checkboxLists
     */
    public $inlineCheckboxListTemplate = "{label}\n{beginWrapper}\n{input}\n{error}\n{hint}\n{endWrapper}";
    /**
     * @var string the template for inline radioLists
     */
    public $inlineRadioListTemplate = "{label}\n{beginWrapper}\n{input}\n{error}\n{endWrapper}\n{hint}";
    /**
     * @var bool whether to render the error. Default is `true` except for layout `inline`.
     */
    public $enableError = true;
    /**
     * @var bool whether to render the label. Default is `true`.
     */
    public $enableLabel = true;

    public $options = ['class'=>'uk-form-row'];


    /**
     * @inheritdoc
     */
    public function __construct($config = [])
    { 
        $layoutConfig = $this->createLayoutConfig($config);
        $config = ArrayHelper::merge($layoutConfig, $config);
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{beginWrapper}'])) {
                $options = $this->wrapperOptions;
                $tag = ArrayHelper::remove($options, 'tag', 'div');
                $this->parts['{beginWrapper}'] = Html::beginTag($tag, $options);
                $this->parts['{endWrapper}'] = Html::endTag($tag);
            }
            if ($this->enableLabel === false) {
                $this->parts['{label}'] = '';
                $this->parts['{beginLabel}'] = '';
                $this->parts['{labelTitle}'] = '';
                $this->parts['{endLabel}'] = '';
            } elseif (!isset($this->parts['{beginLabel}'])) {
                $this->renderLabelParts();
            }
            if ($this->enableError === false) {
                $this->parts['{error}'] = '';
            }
            if ($this->inputTemplate) {
                $input = isset($this->parts['{input}']) ?
                    $this->parts['{input}'] : Html::activeTextInput($this->model, $this->attribute, $this->inputOptions);
                $this->parts['{input}'] = strtr($this->inputTemplate, ['{input}' => $input]);
            }
        }
        return parent::render($content);
    }

    /**
     * @inheritdoc
     */
    public function checkbox($options = [], $enclosedByLabel = true)
    {
        if ($enclosedByLabel) {
            if (!isset($options['template'])) {
                $this->template = $this->form->layout === 'horizontal' ?
                    $this->horizontalCheckboxTemplate : $this->checkboxTemplate;
            } else {
                $this->template = $options['template'];
                unset($options['template']);
            }
            if ($this->form->layout === 'horizontal') {
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
            $this->labelOptions['class'] = null;
        }

        return parent::checkbox($options, false);
    }

    /**
     * @inheritdoc
     */
    public function radio($options = [], $enclosedByLabel = true)
    {
        if ($enclosedByLabel) {
            if (!isset($options['template'])) {
                $this->template = $this->form->layout === 'horizontal' ?
                    $this->horizontalRadioTemplate : $this->radioTemplate;
            } else {
                $this->template = $options['template'];
                unset($options['template']);
            }
            if ($this->form->layout === 'horizontal') {
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
            $this->labelOptions['class'] = null;
        }

        return parent::radio($options, false);
    }

    /**
     * @inheritdoc
     */
    public function checkboxList($items, $options = [])
    {
        if ($this->inline) {
            if (!isset($options['template'])) {
                $this->template = $this->inlineCheckboxListTemplate;
            } else {
                $this->template = $options['template'];
                unset($options['template']);
            }
            if (!isset($options['itemOptions'])) {
                $options['itemOptions'] = [
                    'labelOptions' => ['class' => 'checkbox-inline'],
                ];
            }
        }  elseif (!isset($options['item'])) {
            $options['item'] = function ($index, $label, $name, $checked, $value) {
                return '<div class="checkbox">' . Html::checkbox($name, $checked, ['label' => $label, 'value' => $value]) . '</div>';
            };
        }
        parent::checkboxList($items, $options);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function radioList($items, $options = [])
    {
        if ($this->inline) {
            if (!isset($options['template'])) {
                $this->template = $this->inlineRadioListTemplate;
            } else {
                $this->template = $options['template'];
                unset($options['template']);
            }
            if (!isset($options['itemOptions'])) {
                $options['itemOptions'] = [
                    'labelOptions' => ['class' => 'radio-inline'],
                ];
            }
        }  elseif (!isset($options['item'])) {
            $options['item'] = function ($index, $label, $name, $checked, $value) {
                return '<div class="radio">' . Html::radio($name, $checked, ['label' => $label, 'value' => $value]) . '</div>';
            };
        }
        parent::radioList($items, $options);
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function label($label = null, $options = [])
    {
        if (is_bool($label)) {
            $this->enableLabel = $label;
            if ($label === false && $this->form->layout === 'horizontal') {
                Html::addCssClass($this->wrapperOptions, $this->horizontalCssClasses['offset']);
            }
        } else {
            $this->enableLabel = true;
            $this->renderLabelParts($label, $options);
            parent::label($label, $options);
        }
        return $this;
    }

    /**
     * @param bool $value whether to render a inline list
     * @return static the field object itself
     * Make sure you call this method before [[checkboxList()]] or [[radioList()]] to have any effect.
     */
    public function inline($value = true)
    {
        $this->inline = (bool)$value;
        return $this;
    }

    /**
     * @param array $instanceConfig the configuration passed to this instance's constructor
     * @return array the layout specific default configuration for this instance
     */
     protected function createLayoutConfig($instanceConfig)
    {
        $layout = $instanceConfig['form']->layout;

        if (empty($this->helpinline)) {
            $this->helpinline = $layout === 'stacked' ? false : true;
        }

        $config = [
            'hintOptions' => [
                'tag' => 'span',
                'class' => $this->helpinline  ? 'uk-form-help-inline' : 'uk-form-help-block',
            ],
            'errorOptions' => [
                'tag' => 'span',
                'class' => $this->helpinline  ? 'uk-form-help-inline' : 'uk-form-help-block',
            ],
            'inputOptions' => [
                'class' => '',
            ],
        ];

        if ($layout === 'horizontal') {
            $config['template'] = "{label}\n{beginWrapper}\n{input}\n{error}\n{hint}\n{endWrapper}";
            $cssClasses = [
                'offset' => '',
                'label' => 'uk-form-label',
                'wrapper' => 'uk-form-controls',
                'error' => '',
                'hint' => '',
            ];
            if (isset($instanceConfig['horizontalCssClasses'])) {
                $cssClasses = ArrayHelper::merge($cssClasses, $instanceConfig['horizontalCssClasses']);
            }
            $config['horizontalCssClasses'] = $cssClasses;
            $config['wrapperOptions'] = ['class' => $cssClasses['wrapper']];
            $config['labelOptions'] = ['class' => $cssClasses['label']];
            $config['errorOptions'] = ['tag'=>'span','class' => 'uk-form-help-inline uk-error ' . $cssClasses['error']];
            $config['hintOptions'] = ['tag'=>'span','class' => 'uk-form-help-block mg-block uk-text-small' . $cssClasses['hint']];
        } elseif ($layout === 'inline') {
            $config['labelOptions'] = ['class' => 'sr-only']; 
            $config['enableError'] = false;
        }

        return $config;
    }

    /**
     * @param string|null $label the label or null to use model label
     * @param array $options the tag options
     */
    protected function renderLabelParts($label = null, $options = [])
    {
        $options = array_merge($this->labelOptions, $options);
        if ($label === null) {
            if (isset($options['label'])) {
                $label = $options['label'];
                unset($options['label']);
            } else {
                $attribute = Html::getAttributeName($this->attribute);
                $label = Html::encode($this->model->getAttributeLabel($attribute));
            }
        }
        $this->parts['{beginLabel}'] = Html::beginTag('label', $options);
        $this->parts['{endLabel}'] = Html::endTag('label');
        $this->parts['{labelTitle}'] = $label;
    }
}