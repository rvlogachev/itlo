<?php

namespace common\modules\forms;

/**
 * Yii2 Forms
 *
 * @category        Module
 * @version         1.1.2
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-forms
 * @copyright       Copyright (c) 2019 - 2021 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use rmrevin\yii\fontawesome\FAS;
use Yii;
use common\modules\base\BaseModule;

/**
 * Forms module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\forms\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "list/index";

    /**
     * @var string, the name of module
     */
    public $name = "Forms";

    /**
     * @var string, the description of module
     */
    public $description = "Creating and manage composite forms";

    /**
     * @var array, the list of support locales for multi-language versions of page.
     * @note This variable will be override if you use the `wdmg\yii2-translations` module.
     */
    public $supportLocales = ['ru-RU', 'uk-UA', 'en-US'];

    /**
     * @var string the module version
     */
    private $version = "1.1.2";

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
            'icon' => FAS::icon('paper-plane', ['class' => ['nav-icon']]),
            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]),
            'items' => [
                [
                    'label' => Yii::t('app/modules/forms', 'Forms list'),
                    'url' => [$this->routePrefix . '/forms/list/'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['forms']) &&  Yii::$app->controller->id == 'list'),
                ],
                [
                    'label' => Yii::t('app/modules/forms', 'Fields list'),
                    'url' => [$this->routePrefix . '/forms/fields/'],
                    'icon' => FAS::icon('hackerrank', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['forms']) &&  Yii::$app->controller->id == 'fields'),
                ],
                [
                    'label' => Yii::t('app/modules/forms', 'Filling results'),
                    'url' => [$this->routePrefix . '/forms/submitted/'],
                    'icon' => FAS::icon('search', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['forms']) &&  Yii::$app->controller->id == 'submitted'),
                ]
            ]
        ];
        return $items;
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app) {
        parent::bootstrap($app);

        // Configure forms component
        $app->setComponents([
            'forms' => [
                'class' => 'common\modules\forms\components\Forms'
            ]
        ]);
    }
}