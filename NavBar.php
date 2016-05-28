<?php
namespace worstinme\uikit;
use yii\helpers\Html;
use Yii;
/**
 * NavBar renders a navbar HTML component.
 *
 * Any content enclosed between the [[begin()]] and [[end()]] calls of NavBar
 * is treated as the content of the navbar. You may use widgets such as [[Nav]]
 * or [[\yii\widgets\Menu]] to build up such content. For example,
 *
 * ```php
 * use yii\uikit\NavBar;
 * use yii\uikit\Nav;
 *
 * NavBar::begin();
 * echo Nav::widget([
 *     'items' => [
 *         ['label' => 'Home', 'url' => ['/site/index']],
 *         ['label' => 'About', 'url' => ['/site/about']],
 *     ],
 * ]);
 * NavBar::end();
 * ```
 *
 * @see http://www.getuikit.com/docs/navbar.html
 * @author Nikolay Kostyurin <nikolay@artkost.ru>
 * @since 2.0
 */
class NavBar extends Widget
{

    public $brandLabel = false;
    public $brandUrl = false;
    public $container = false;
    public $brandOptions = [];
    public $offcanvas = false;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();
        $this->clientOptions = false;
        Html::addCssClass($this->options, 'uk-navbar');

        if (empty($this->options['role'])) {
            $this->options['role'] = 'navigation';
        }
        echo Html::beginTag('nav', $this->options);

        if ($this->container) {
            echo Html::beginTag('div', ['class'=>'uk-container uk-container-center']);
        }

        if ($this->offcanvas) {
            echo Html::a('','#'.($this->offcanvas === true ? 'offcanvas' : $this->offcanvas),
                ['class'=>'uk-navbar-toggle uk-visible-small','data-uk-offcanvas'=>true]);
        }

        if ($this->brandLabel !== false) {
            Html::addCssClass($this->brandOptions, ['widget' => 'uk-navbar-brand']);
            echo Html::a($this->brandLabel, $this->brandUrl === false ? Yii::$app->homeUrl : $this->brandUrl, $this->brandOptions);
        }
    }
    /**
     * Renders the widget.
     */
    public function run()
    {
        
        if ($this->offcanvas) {
            echo Html::endTag('div');
        } 
        echo Html::endTag('nav');
    }
}