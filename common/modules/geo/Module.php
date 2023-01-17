<?php

namespace common\modules\geo;

/**
 * Yii2 GEO
 *
 * @category        Module
 * @version         1.1.8
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-geo
 * @copyright       Copyright (c) 2019 - 2020 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use rmrevin\yii\fontawesome\FAS;
use Yii;
use common\modules\base\BaseModule;


/**
 * GEO module definition class
 */
class Module extends BaseModule
{

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\geo\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "geo/index";

    /**
     * @var string, the name of module
     */
    public $name = "Locations";

    /**
     * @var string, the description of module
     */
    public $description = "Geo module with countries and cities";

    /**
     * @var string the module version
     */
    private $version = "1.1.8";

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
        return [
            'label' => $this->name,
            'url' => [$this->routePrefix . '/'. $this->id],
            'icon' => FAS::icon('globe-americas', ['class' => ['nav-icon']]),
            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]),
            'items' => [
                [
                    'label' => Yii::t('app/modules/geo', 'Countries list'),
                    'url' => [$this->routePrefix . '/geo/countries/index'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['geo']) &&  Yii::$app->controller->id == 'countries'),
                ],
                [
                    'label' => Yii::t('app/modules/geo', 'Regions list'),
                    'url' => [$this->routePrefix . '/geo/regions/index'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['geo']) &&  Yii::$app->controller->id == 'regions'),
                ],
                [
                    'label' => Yii::t('app/modules/geo', 'Cities list'),
                    'url' => [$this->routePrefix . '/geo/cities/index'],
                    'icon' => FAS::icon('city', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['geo']) &&  Yii::$app->controller->id == 'cities'),
                ],
                [
                    'label' => Yii::t('app/modules/geo', 'Translations'),
                    'url' => [$this->routePrefix . '/geo/translations/index'],
                    'icon' => FAS::icon('language', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['geo']) &&  Yii::$app->controller->id == 'translations'),
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app) {
        parent::bootstrap($app);
    }
}
