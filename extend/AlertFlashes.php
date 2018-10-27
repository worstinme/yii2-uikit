<?php
namespace worstinme\uikit\extend;

use worstinme\uikit\Alert;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Usage example
 *
 * ```
 * \worstinme\uikit\extend\AlertFlashes::widget();
 *
 * ```
 */
class AlertFlashes extends Widget
{
    /**
     * @var array default catched flashes
     */
    private $alertTypes = [
        'error'   => 'danger',
        'danger'  => 'danger',
        'success' => 'success',
        'info'    => 'primary',
        'warning' => 'warning',
    ];

    /**
     * @var string $type Flash alias and alert widget class-type
     */
    public $type;

    public $closeButton = [];

    public function run()
    {
        $session = \Yii::$app->getSession();

        if ($this->type === null) {
            $flashes = $session->getAllFlashes();
            foreach ($flashes as $type => $data) {
                if (isset($this->alertTypes[$type])) {
                    $data = (array) $data;
                    foreach ($data as $message) {
                        echo Alert::widget([
                            'body'=>Html::tag('p',$message),
                            'type'=>$this->alertTypes[$type],
                            'closeButton' => $this->closeButton,
                        ]);
                    }
                    $session->removeFlash($type);
                }
            }
        }
        elseif(($message = $session->getFlash($this->type)) !== null) {

            echo Alert::widget([
                'body'=>Html::tag('p',$message),
                'type'=>$this->type,
                'closeButton' => $this->closeButton,
            ]);

        }
    }
}
