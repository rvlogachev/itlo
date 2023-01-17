<?php

namespace common\modules\messages;


use rmrevin\yii\fontawesome\FAS;
use Yii;
use common\modules\base\BaseModule;

/**
 * Messages module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\messages\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "messages/index";

    /**
     * @var string, the name of module
     */
    public $name = "Messages";

    /**
     * @var string, the description of module
     */
    public $description = "Private messaging system";

    /**
     * @var string the module version
     */
    private $version = "0.0.8";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 8;

    /**
     * {@inheritdoc}
     */
    public function dashboardNavItems($createLink = false)
    {
        $items = [
            'label' => Yii::t('app/modules/messages',$this->name),
            'url' => [$this->routePrefix . '/'. $this->id],
            'icon' => FAS::icon('inbox', ['class' => ['nav-icon']]),
            'active' => in_array(\Yii::$app->controller->module->id, [$this->id])
        ];
        return $items;
    }

    public function bootstrap($app)
    {
        parent::bootstrap($app);
    }
}