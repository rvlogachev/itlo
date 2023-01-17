<?php

namespace common\modules\bookmarks;

/**
 * Yii2 Bookmarks
 *
 * @category        Module
 * @version         0.0.10
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-bookmarks
 * @copyright       Copyright (c) 2019 - 2020 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use common\modules\bookmarks\components\Bookmarks;
use rmrevin\yii\fontawesome\FAS;
use Yii;
use common\modules\base\BaseModule;
use common\modules\bookmarks\components\Crypto;

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
    public $name = "Bookmarks";

    /**
     * @var string, the description of module
     */
    public $description = "Bookmarks storage module";

    /**
     * @var string the module version
     */
    private $version = "0.0.10";

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

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        parent::bootstrap($app);

        // Configure options component
        $app->setComponents([
            'bookmarks' => [
                'class' => Bookmarks::class
            ]
        ]);
    }
}