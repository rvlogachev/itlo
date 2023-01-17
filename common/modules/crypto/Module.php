<?php

namespace common\modules\crypto;


use rmrevin\yii\fontawesome\FAS;
use Yii;
use common\modules\base\BaseModule;
use common\modules\crypto\components\Crypto;

/**
 * Bookmarks module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\bookmarks\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = 'bookmarks/index';

    /**
     * @var string, the name of module
     */
    public $name = "Crypto";

    /**
     * @var string, the description of module
     */
    public $description = "Crypto projects module";

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
            'icon' => FAS::icon('bitcoin', ['class' => ['nav-icon']]),

            'active' => in_array(\Yii::$app->controller->module->id, [$this->id])
        ];
        return $items;
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        parent::bootstrap($app);

        // Configure options component
        $app->setComponents([
            'crypto' => [
                'class' => Crypto::class
            ]
        ]);
    }
}