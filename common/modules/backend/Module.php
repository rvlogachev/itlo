<?php
namespace common\modules\backend;

use common\modules\base\BaseModule;
use rmrevin\yii\fontawesome\FAS;

/**
 * Class BackendModule
 * @package common\modules\backend
 */
class Module extends BaseModule
{
    public $controllerNamespace = 'common\modules\backend\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = 'backend/index';

    /**
     * @var string, the name of module
     */
    public $name = "Backend";

    /**
     * @var string, the description of module
     */
    public $description = "Backend module";

    /**
     * @var string the module version
     */
    private $version = "0.0.1";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 10;


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // Set version of current module
        $this->setVersion($this->version);

        // Set priority of current module
        $this->setPriority($this->priority);

    }

    /**
     * {@inheritdoc}
     */
    public function dashboardNavItems($createLink = false)
    {
        $items = [
            'label' => $this->name,
            'url' => [$this->routePrefix . '/'. $this->id],
            'icon' => FAS::icon('bookmark', ['class' => ['nav-icon']]),

            'active' => in_array(\Yii::$app->controller->module->id, [$this->id])
        ];
        return $items;
    }


}
