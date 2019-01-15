<?php
/**
 * This file is part of the yii2-uikit project.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 *
 * @copyright yii2-uikit (c) 2018
 * @author Eugene Zakirov (worstinme) <box@flyleaf.su>
 */

namespace worstinme\uikit;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 * A Uikit 3 enhanced version of [[\yii\widgets\ActiveForm]].
 *
 * This class mainly adds the [[layout]] property to choose a Uikit 3 form layout and [[grid]] property to add grid options to the form tag
 * So for example to render a horizontal form you would:
 *
 * ```php
 * use worstinme\uikit\ActiveForm;
 *
 * $form = ActiveForm::begin(['layout' => 'horizontal'])
 * ```
 *
 * ```php
 * use worstinme\uikit\ActiveForm;
 *
 * $form = ActiveForm::begin(['grid' => true])
 * ```
 *
 * This will set default values for the [[ActiveField]]
 * to render grid of fields. In particular the [[ActiveField::width]]
 * is set to '1-1'
 *
 * To get a different column layout in grid mode you can modify those options
 * through [[fieldConfig]]:
 *
 * ```php
 * $form = ActiveForm::begin([
 *     'grid' => true,
 *     'fieldConfig' => [
 *         'width' => "1-3@m"
 *     ],
 * ]);
 * ```
 * or
 *
 * ```php
 * $form->field($model,'attribute',['width'=>'auto@m']);
 * ```
 * or
 *
 * ```php
 * $form = ActiveForm::begin([
 *     'layout' => 'horizontal',
 *     'options' => [
 *         'class' => "uk-child-width-1-2@m uk-grid-small"
 *     ],
 * ]);
 * ```
 *
 * @see ActiveField for details on the [[fieldConfig]] options
 * @see https://getuikit.com/docs/form
 *
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * {@inheritdoc}
     */
    public $successCssClass = 'uk-form-success';

    /**
     * {@inheritdoc}
     */
    public $errorCssClass = 'uk-form-danger';

    /**
     * {@inheritdoc}
     */
    public $validationStateOn = self::VALIDATION_STATE_ON_INPUT;

    /**
     * @var string the default field class name when calling [[field()]] to create a new field.
     * @see fieldConfig
     */
    public $fieldClass = 'worstinme\uikit\ActiveField';

    /**
     * @var array HTML attributes for the form tag. Default is `[]`.
     */
    public $options = [];

    /**
     * @var string the form layout. Either 'default', 'horizontal' or 'inline'.
     * By choosing a layout, an appropriate default field configuration is applied. This will
     * render the form fields with slightly different markup for each layout. You can
     * override these defaults through [[fieldConfig]].
     * @see \yii\bootstrap\ActiveField for details on Bootstrap 3 field configuration
     */
    public $layout = 'horizontal';

    /**
     * @var bool if true, uikit grid options will be add to form and field tags
     */
    public $grid = false;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        if (!in_array($this->layout, ['horizontal', 'stacked'])) {
            throw new InvalidConfigException('Invalid layout type: ' . $this->layout);
        }

        Html::addCssClass($this->options, 'uk-form');

        if ($this->layout !== 'grid') {
            Html::addCssClass($this->options, 'uk-form-' . $this->layout);
        }

        if ($this->grid) {
            Html::addCssClass($this->options, 'uk-grid uk-child-width-1-1');
            $this->options['uk-grid'] = true;
        }

        parent::init();
    }

    /**
     * @return ActiveField
     */
    public function field($model, $attribute, $options = [])
    {
        return parent::field($model, $attribute, $options);
    }
}
