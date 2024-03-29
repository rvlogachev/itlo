<?php

namespace common\modules\comments;

/**
 * Yii2 Comments
 *
 * @category        Module
 * @version         0.0.11
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-comments
 * @copyright       Copyright (c) 2019 - 2020 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use rmrevin\yii\fontawesome\FAS;
use Yii;
use common\modules\base\BaseModule;

/**
 * comments module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\comments\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = 'comments/index';

    /**
     * @var string, the name of module
     */
    public $name = "Comments";

    /**
     * @var string, the description of module
     */
    public $description = "Tree comments system";

    /**
     * @var string the module version
     */
    private $version = "0.0.11";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 8;

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
            'icon' => FAS::icon('comments', ['class' => ['nav-icon']]),

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
    }
}