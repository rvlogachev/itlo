<?php
namespace common\modules\cms;
use common\modules\base\BaseModule;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Url;

/**
 * Class Module
 * @package common\modules\cms
 */
class Module extends BaseModule
{
    public $controllerNamespace = 'common\modules\cms\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = 'admin-cms-site/index';

    public $routePrefix = 'admin';

    /**
     * @var string, the name of module
     */
    public $name = "CMS";

    /**
     * @var string, the description of module
     */
    public $description = "CMS main system modules";

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
            'url' => '#',
            'icon' => FAS::icon('comments', ['class' => ['nav-icon']]),
            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && !in_array(\Yii::$app->controller->id, ['admin-user-phone','admin-user-email','admin-user']),
            'items' => [
                [
                'label' => \Yii::t('app/modules/cms', 'Begin'),
                'url' => ['/'.$this->id.'/cms/index'],
                'icon' => FAS::icon('bookmark', ['class' => ['nav-icon']]),
                'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'cms'
                ],

                [
                    'label' => \Yii::t('app/modules/cms', 'Sites'),
                    'url' => [$this->routePrefix . '/'. $this->id],
                    'icon' => FAS::icon('list-alt', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-site'
                ],
                [
                    'label' => \Yii::t('app/modules/cms', 'Content'),
                    'url' => '#',
                    'icon' => FAS::icon('tasks', ['class' => ['nav-icon']]),
                    //'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-tree'
                    'items'=> [
                        [
                            'label' => \Yii::t('app/modules/cms', 'Section Site'),
                            'url' => [$this->routePrefix . '/'. $this->id.'/admin-tree'],
                            'icon' => FAS::icon('tasks', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-tree'
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'Posts'),
                            'url' => Url::to([$this->routePrefix . '/'. $this->id.'/admin-cms-content-element','content_id'=>1]),
                            'icon' => FAS::icon('layer-group', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-content-element'
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'Slides'),
                            'url' => Url::to([$this->routePrefix . '/'. $this->id.'/admin-cms-content-element','content_id'=>2]),
                            'icon' => FAS::icon('layer-group', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-content-element'
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'Services'),
                            'url' => Url::to([$this->routePrefix . '/'. $this->id.'/admin-cms-content-element','content_id'=>3]),
                            'icon' => FAS::icon('layer-group', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-content-element'
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'File Manager'),
                            'url' => [$this->routePrefix . '/'. $this->id.'/admin-file-manager'],
                            'icon' => FAS::icon('layer-group', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-file-manager'
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'File Storage'),
                            'url' => [$this->routePrefix . '/'. $this->id.'/admin-storage-files'],
                            'icon' => FAS::icon('file', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-storage-files'
                        ],

                    ]
                ],

                [
                    'label' => \Yii::t('app/modules/cms', 'Settings'),
                    'url' => '#',
                    'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && in_array(\Yii::$app->controller->id,['admin-info','admin-settings','admin-cms-lang','admin-storage',
                                                        'admin-cms-tree-type','admin-cms-tree-type-property', 'admin-cms-tree-type-property-enum','admin-cms-user-universal-property',
                                                        'admin-cms-user-universal-property-enum', 'admin-cms-content-property','admin-cms-content-property-enum','admin-cms-content','admin-clear','admin-profile']),
                    'items'=>[
                        [
                            'label' => \Yii::t('app/modules/cms', 'Profile'),
                            'url' => ['/'.$this->id.'/admin-profile/update'],
                            'icon' => FAS::icon('user', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-profile'
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'Languages'),
                            'url' => ['/'.$this->id.'/admin-cms-lang/index'],
                            'icon' => FAS::icon('language', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-lang'
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'Setting sections'),
                            'url' => '#',
                            'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) &&
                                in_array(\Yii::$app->controller->id,['admin-cms-tree-type', 'admin-cms-tree-type-property','admin-cms-tree-type-property-enum']),
                            'items' => [
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Types'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-cms-tree-type'],
                                    'icon' => FAS::icon('tree', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-tree-type'
                                ],
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Properties'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-cms-tree-type-property'],
                                    'icon' => FAS::icon('dot-circle', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-tree-type-property'
                                ],
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Options'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-cms-tree-type-property-enum'],
                                    'icon' => FAS::icon('dot-circle ', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-tree-type-property-enum'
                                ],
                            ]
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'Content settings'),
                            'url' => '#',
                            'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) &&
                                in_array(\Yii::$app->controller->id,['admin-cms-content-property','admin-cms-content-property-enum','admin-cms-content']),
                            'items' => [
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Properties'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-cms-content-property'],
                                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-content-property'
                                ],
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Options'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-cms-content-property-enum'],
                                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-content-property-enum'
                                ],
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Publications'),
                                    'url' => Url::to([$this->routePrefix . '/'. $this->id.'/admin-cms-content/update', 'pk'=>1]) ,
                                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-content'
                                ],
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Slides'),
                                    'url' => Url::to([$this->routePrefix . '/'. $this->id.'/admin-cms-content/update', 'pk'=>2]) ,
                                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-content'
                                ],
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Services'),
                                    'url' => Url::to([$this->routePrefix . '/'. $this->id.'/admin-cms-content/update', 'pk'=>3]) ,
                                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-content'
                                ],
                            ]
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'User settings'),
                            'url' => '#',
                            'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) &&
                                in_array(\Yii::$app->controller->id,['admin-cms-user-universal-property','admin-cms-user-universal-property-enum']),
                            'items' => [
                                [
                                    'label' => \Yii::t('app/modules/cms', 'User properties'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-cms-user-universal-property'],
                                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-user-universal-property'
                                ],
                                [
                                        'label' => \Yii::t('app/modules/cms', 'User options'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-cms-user-universal-property-enum'],
                                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-cms-user-universal-property-enum'
                                ],

                            ]
                        ],
                        [

                            'label' => \Yii::t('app/modules/cms', 'CMS Settings'),
                            'url' => '#',
                            'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && in_array(\Yii::$app->controller->id,['admin-settings']),
                            'items' => [
                                [
                                    'label' => \Yii::t('app/modules/cms', 'CMS Settings'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-settings'],
                                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && in_array(\Yii::$app->controller->id,['admin-settings']),
                                ]
                            ]
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'Manage servers'),
                            'url' => '#',
                            'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-storage',
                            'items' => [
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Storage'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-storage'],
                                    'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-storage'
                                ],


                                [
                                    'label' => \Yii::t('app/modules/cms', '222222 servers'),
                                    'url' => '#',
                                    'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-storage',
                                    'items' => [
                                        [
                                            'label' => \Yii::t('app/modules/cms', 'Storage'),
                                            'url' => [$this->routePrefix . '/'. $this->id.'/admin-storage'],
                                            'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-storage'
                                        ],

                                    ]
                                ],
                            ]
                        ],
                        [
                            'label' => \Yii::t('app/modules/cms', 'Additional'),
                            'url' => '#',
                            'icon' => FAS::icon('comments', ['class' => ['nav-icon']]),
                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && in_array(\Yii::$app->controller->id, [$this->id,'admin-clear']),
                            'items'=> [
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Information'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-info'],
                                    'icon' => FAS::icon('comments', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-info',
                                ],
                                [
                                    'label' => \Yii::t('app/modules/cms', 'Clear temporary'),
                                    'url' => [$this->routePrefix . '/'. $this->id.'/admin-clear'],
                                    'icon' => FAS::icon('comments', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-clear',
                                ],



                                [
                                    'label' => \Yii::t('app/modules/cms', 'Manage servers'),
                                    'url' => '#',
                                    'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-storage',
                                    'items' => [
                                        [
                                            'label' => \Yii::t('app/modules/cms', 'Storage'),
                                            'url' => [$this->routePrefix . '/'. $this->id.'/admin-storage'],
                                            'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
                                            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && \Yii::$app->controller->id == 'admin-storage'
                                        ],

                                    ]
                                ],

                            ]
                        ],
                    ],
                ],

            ]
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