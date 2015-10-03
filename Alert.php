<?php


namespace worstinme\uikit\widgets;

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


    public $closeButton = [];

    public function init()
    {
        parent::init();

        $session = \Yii::$app->getSession();
        $flashes = $session->getAllFlashes();
        $appendCss = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $data) {
            if (isset($this->alertTypes[$type])) {
                $data = (array) $data;
                foreach ($data as $message) {
                    /* initialize css class for each alert box */
                    $this->options['class'] = $this->alertTypes[$type] . $appendCss;

                    /* assign unique id to each alert box */
                    $this->options['id'] = $this->getId() . '-' . $type;

                    echo '<div id="'.$this->options['id'].'" class="uk-alert '.$this->options['class'].'" data-uk-alert>';
                    echo '<a href="" class="uk-alert-close uk-close"></a>';
                    echo '<p>'.$message.'</p>';
                    echo '</div>';
                }

                $session->removeFlash($type);
            }
        }
    }
}