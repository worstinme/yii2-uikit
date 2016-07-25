<?php

namespace worstinme\uikit;

use yii\helpers\Html;

class Alert extends \yii\base\Widget
{

    public $alertTypes = [
        'error'   => 'uk-alert-danger',
        'danger'  => 'uk-alert-danger',
        'success' => 'uk-alert-success',
        'info'    => 'uk-alert-primary',
        'warning' => 'uk-alert-warning',
    ];

    public $options;

    public $type;

    public $closeButton = [];

    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();

        if (!empty($this->options['data']) && is_array($this->options['data'])) {
            $this->options['data']['uk-alert'] = true;
        }
        else {
            $this->options['data'] = ['uk-alert'=>''];
        }

        $this->options['id'] = $this->getId();

        if (isset($this->options['class'])) {
            $this->options['class'] .= ' uk-alert';
        }
        else {
            $this->options['class'] = 'uk-alert';
        }

        if ($this->type === null) {
            
            $flashes = $session->getAllFlashes();

            foreach ($flashes as $type => $data) {
                if (isset($this->alertTypes[$type])) {
                    $data = (array) $data;
                    foreach ($data as $message) {
                        $this->options['class'] .= ' '.$this->alertTypes[$type];
                        echo Html::beginTag('div',$this->options);
                        echo Html::a('', $url = null, ['class' => 'uk-alert-close uk-close']);
                        echo '<p>'.$message.'</p>';
                        echo Html::endTag('div');
                    }

                    $session->removeFlash($type);
                }
            }

        }
        elseif(($message = $session->getFlash($this->type)) !== null) {
            echo Html::beginTag('div',$this->options);
            echo Html::a('', $url = null, ['class' => 'uk-alert-close uk-close']);
            echo Html::tag('p',$message);
            echo Html::endTag('div');
        }
    }
}