<?php

namespace common\modules\backend;

use common\modules\backend\events\ViewRenderEvent;
use yii\base\Event;
use yii\web\Controller;

/**
 * @property IHasInfoActions|Controller $controller
 *
 * Class AdminViewAction
 * @package common\modules\cms\modules\admin\actions
 */
class ViewBackendAction extends BackendAction
{
    /**
     *
     */
    const EVENT_BEFORE_RENDER = 'beforeRender';
    /**
     *
     */
    const EVENT_AFTER_RENDER = 'afterRender';

    /**
     * @var string
     */
    public $defaultView = '';


    public function init()
    {
        if (!$this->defaultView) {
            $this->defaultView = $this->id;
        }

        parent::init();
    }

    /**
     * @return $this|mixed
     */
    public function run()
    {

        if ($this->callback) {
            $result = call_user_func($this->callback, $this);
        } else {
            $result = $this->render($this->defaultView);
        }

        return $result;
    }


    /**
     * Renders a view
     *
     * @param string $viewName view name
     * @return string result of the rendering
     */
    protected function render($viewName, $params = [])
    {
        $e = new ViewRenderEvent();
        $this->trigger(self::EVENT_BEFORE_RENDER, $e);
        $result = (string)$e->content;

        $result .= $this->controller->getView()->render($viewName, $params, $this->controller);


        //$result .= $this->controller->render($viewName);

        $e = new ViewRenderEvent();
        $this->trigger(self::EVENT_AFTER_RENDER, $e);
        $result .= (string)$e->content;

        return $this->controller->renderContent($result);
    }


}