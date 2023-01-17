<?php

namespace common\modules\admin;

/**
 * Admin dashboard for Butterfly.CMS
 *
 * @category        Module
 * @version         1.3.2
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-admin
 * @copyright       Copyright (c) 2019 - 2021 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use common\modules\admin\models\Modules;
use rmrevin\yii\fontawesome\FAS;
use Yii;
use common\modules\base\BaseModule;
use common\modules\helpers\src\ArrayHelper;
use yii\helpers\Url;

/**
 * api module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = 'admin/index';

    /**
     * @var string, the name of module
     */
    public $name = "Dashboard";

    /**
     * @var string, the description of module
     */
    public $description = "Main administrative panel";

    /**
     * @var boolean, the flag if updates check turn on
     */
    public $checkForUpdates = true;

    /**
     * @var integer, the time to expire cache
     */
    public $cacheExpire = 3600;
    public $rememberDuration = 86400;
    public $resetTokenExpire = 3600;
    public $supportEmail = 'noreply@example.com';

    /**
     * @var array, expanding the list of language locales for searching translations
     */
    public $customLocales = [];

    /**
     * @var array, expanding the list of modules available for installation and download
     */
    public $customSupportModules = [];

    /**
     * @var array, extending the sidebar menu list
     */
    public $customSidebarMenu = [];

    /**
     * @var array, expanding the creation menu list
     */
    public $customCreateMenu = [];

    /**
     * @var string the module version
     */
    private $version = "1.3.2";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 0;

    /**
     * @var array, support system languages
     */
    private $locales = [
        'en-US' => 'English',
        'ru-RU' => 'Русский',
    ];

    /**
     * @var array of support modules
     */
    private $support = [
        'backend/activity',
        'backend/amp',
        'backend/api',
        'backend/backend',
        'backend/blog',
        'backend/billing',
//        'backend/catalog',
        'backend/bookmarks',
        'backend/bot',
        'backend/chat',
        'backend/content',
        'backend/comments',
        'backend/disk',
        'backend/forms',
        'backend/file',
        'backend/geo',
        'backend/guard',
        'backend/likes',
        'backend/messages',
        'backend/media',
        'backend/menu',
        'backend/mails',
        'backend/mailer',
        'backend/news',
        'backend/newsletters',
        'backend/options',
        'backend/pages',
        'backend/profiles',
        'backend/rbac',
        'backend/redirects',
        'backend/reposts',
        'backend/robots',
        'backend/reviews',
        'backend/services',
        'backend/stats',
        'backend/store',
        'backend/search',
        'backend/sitemap',
        'backend/system',
        'backend/subscribers',
        'backend/tasks',
        'backend/tickets',
        'backend/rss',
        'backend/turbo',
        'backend/translations',
        'backend/terminal',
        'backend/users',
        'backend/views',
        'backend/votes',
        'backend/widget',
        'backend/mii',
        'backend/cms'


    ];

    /**
     * @var array of main menu items
     */
    private $menu = [
        [
            'label' => 'Dashboard',
            'icon' => 'fa fa-fw fa-tachometer-alt',
            'url' => ['/admin/admin/index'],
            'order' => 1,
        ],
        [
            'label' => 'Modules',
            'icon' => 'fa fa-fw fa-puzzle-piece',
            'url' => ['/admin/admin/modules'],
            'order' => 1,
        ],
        [
            'label' => 'System',
            'icon' => 'fa fa-fw fa-cogs',
            'items' => [
                'activity',
                'api',
                'options',
                'services',
                'redirects',
                'robots',
                'mailer',
                [
                    'label' => 'Information',
                    'icon' => 'fa fa-fw fa-info-circle',
                    'url' => ['/admin/admin/info'],
                    'order' => 99,
                ],
            ],
            'order' => 2,
        ],
        [
            'label' => 'Users',
            'icon' => 'fa fa-fw fa-users',
            'items' => ['users', 'profiles', 'rbac'],
            'order' => 14,
        ],
        [
            'label' => 'Content',
            'icon' => 'fa fa-fw fa-archive',
            'items' => ['pages', 'media', 'content'],
            'order' => 7,
        ],
        [
            'label' => 'Publications',
            'icon' => 'fa fa-fw fa-pencil-alt',
            'items' => [
                'news',
                'blog',
                'subscribers',
                'newsletters'
            ],
            'order' => 8,
        ],
        [
            'label' => 'E-commerce',
            'icon' => 'fa fa-fw fa-shopping-bag',
            'items' => ['catalog', 'store', 'billing'],
            'order' => 9,
        ],
        [
            'label' => 'Feedbacks',
            'icon' => 'fa fa-fw fa-comments',
            'items' => ['reviews', 'comments', 'forms'],
            'order' => 10,
        ],
        [
            'label' => 'Socials',
            'icon' => 'fa fa-fw fa-share-alt',
            'items' => ['messages', 'likes', 'bookmarks', 'reposts', 'views', 'votes'],
            'order' => 11,
        ],
        [
            'label' => 'Security',
            'icon' => 'fa fa-fw fa-shield-alt',
            'item' => 'guard',
            'order' => 12,
        ],
        [
            'label' => 'Common',
            'icon' => 'fa fa-fw fa-wrench',
            'items' => ['menu', 'search', 'geo', 'translations', 'rss', 'turbo', 'amp', 'sitemap'],
            'order' => 13,
        ],
        [
            'label' => 'Stats',
            'icon' => 'fa fa-fw fa-chart-pie',
            'item' => 'stats',
            'order' => 14,
        ],
        [
            'label' => 'Support',
            'icon' => 'fa fa-fw fa-life-ring',
            'items' => ['tasks', 'tickets'],
            'order' => 15,
        ]
    ];

    /**
     * @var array of create menu items
     */
    private $createMenu = [
        'backend/pages' => [
            'label' => 'Page',
            'url' => ['/admin/pages/pages/create/']
        ],
        'backend/media' => [
            'label' => 'Media item',
            'url' => ['/admin/pages/pages/create/']
        ],
        'backend/content' => [
            [
                'label' => 'Content block',
                'url' => ['/admin/content/blocks/create/']
            ],
            [
                'label' => 'Content list',
                'url' => ['/admin/content/lists/create/']
            ],
        ],
        'backend/menu' => [
            'label' => 'Menu item',
            'url' => ['/admin/menu/list/create/'],
        ],
        'backend/news' => [
            'label' => 'News',
            'url' => ['/admin/news/news/create/']
        ],
        'backend/blog' => [
            'label' => 'Post',
            'url' => ['/admin/blog/posts/create/']
        ],
        'backend/subscribers' => [
            'label' => 'Subscriber',
            'url' => ['/admin/subscribers/all/create/']
        ],
        'backend/newsletters' => [
            'label' => 'Newsletter',
            'url' => ['/admin/newsletters/list/create/']
        ],
        'backend/forms' => [
            'label' => 'Form',
            'url' => ['/admin/forms/list/create/']
        ],
        'backend/users' => [
            'label' => 'User',
            'url' => ['/admin/users/users/create/']
        ],
        'backend/tasks' => [
            'label' => 'Task',
            'url' => ['/admin/tasks/item/create/']
        ],
        'backend/translations' => [
            'label' => 'Translate',
            'url' => ['/admin/translations/list/create/']
        ],
    ];

    /**
     * @var bool, of show disabled menu items in dashboard
     */
    public $menuShowDisabled = false;

    /**
     * @var bool, of allow to multi Sign In
     */
    public $multiSignIn = false; // not allow by default

    /**
     * @var integer, session timeout in sec. of auth (where `0` is unlimited)
     */
    public $sessionTimeout = 60 * 15; // 15 min.

    /**
     * @var bool, the flag for configuration Sphinx Search
     */
    public $useSphinxSearch = true;

    /**
     * @var array, configuration of Sphinx Search daemon
     */
    public $sphinxSearchConf = [
        'dsn' => "mysql",
        'host' => "127.0.0.1",
        'port' => "9306",
        'username' => "root",
        'password' => "root",
    ];

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

        if (!Yii::$app instanceof \yii\console\Application) {

            // Set authorization route
            Yii::$app->user->loginUrl = ['admin/login'];

            // Set assets bundle, if not loaded
            if ($this->isBackend() && !$this->isConsole()) {

//                if (!isset(Yii::$app->assetManager->bundles['common\modules\admin\AdminAsset']))
//                    Yii::$app->assetManager->bundles['common\modules\admin\AdminAsset'] = \common\modules\admin\AdminAsset::register(Yii::$app->view);
//
//                if (!isset(Yii::$app->assetManager->bundles['common\modules\admin\FontAwesomeAssets']))
//                    Yii::$app->assetManager->bundles['common\modules\admin\FontAwesomeAssets'] = \common\modules\admin\FontAwesomeAssets::register(Yii::$app->view);

            }

            // Check of updates and return current version
//            $meta = $this->getMetaData();
//            $version = $this->getVersion();
//            if ($new_version = $this->checkUpdates($meta['name'], $version)) // Check of updates for `backend/admin`
//                $this->view->params['version'] = 'v'. $version . ' <label class="label label-danger">Available update to ' . $new_version . '</label>';
//            else
//                $this->view->params['version'] = 'v'. $version;

        }

    }

    /**
     * Return list of support languages
     * @return array of locales
     */
    public function getSupportLanguages()
    {
        return ArrayHelper::merge((is_array($this->customLocales) ? $this->customLocales : []), $this->locales);
    }

    /**
     * Return list of support modules
     * @return array of modules vendor/name
     */
    public function getSupportModules()
    {


        $modules = Modules::find()->select('module')->where(['status'=>Modules::MODULE_STATUS_ACTIVE])->asArray()->all();

        $modules_array = [];
        $support = [];
        foreach ($modules as $module) {

           $modules_array[] = $module['module'];
        }

        foreach ($this->support as $module) {


            $module_name = explode('/',$module)[1];


            if (!in_array($module_name ,$modules_array)) {
                $support[] = $module;
            }



        }



         $modules = ArrayHelper::merge((is_array($this->customSupportModules) ? $this->customSupportModules : []), $support);

         $arr = [];
         $i = 0;
        foreach ($modules as $module) {

            $arr[$i]['id'] = $i;
            $arr[$i]['name'] = $module;
           $i++;
        }

        return $arr;

    }
    public function getMenuItems()
    {
        return ArrayHelper::merge((is_array($this->customSidebarMenu) ? $this->customSidebarMenu : []), $this->menu);
    }

    /**
     * Return list of dashboard main menu items
     * @return array
     */
    public function getMenuItems2()
    {

        $menu [] = [
            'label' => Yii::t('app/modules/admin', 'Dashboards'),
            'icon' => FAS::icon('tachometer-alt', ['class' => ['nav-icon']]),
            'url' => ['#'],
            'items' => [
                [
                    'label' => Yii::t('app/modules/admin', 'Main Dashboard'),
                    'icon' => FAS::icon('tachometer-alt', ['class' => ['nav-icon']]),
                    'url' => ['/admin/index'],
                    'active' => in_array(\Yii::$app->controller->module->id, ['admin']) &&  in_array(\Yii::$app->controller->id, ['index']),
                    'order' => 1,
                ],
                [
                    'label' => Yii::t('app/modules/admin', 'Dashboard 1 (Common)'),
                    'icon' => FAS::icon('tachometer-alt', ['class' => ['nav-icon']]),
                    'url' => Url::to(['/adm/admin-index/dashboard','pk'=>1]),
                    'active' => in_array(\Yii::$app->controller->module->id, ['adm']) &&  in_array(\Yii::$app->controller->id, ['dashboard']),
                    'order' => 2,
                ],
                [
                    'label' => Yii::t('app/modules/admin', 'Dashboard 2 (Content)'),
                    'icon' => FAS::icon('tachometer-alt', ['class' => ['nav-icon']]),
                    'url' => ['/adm/admin-index/dashboard','pk'=>2],
                    'active' => in_array(\Yii::$app->controller->module->id, ['adm']) &&  in_array(\Yii::$app->controller->id, ['dashboard']),
                    'order' => 3,
                ],
            ],
            'order' => 1,
        ];
        $menu [] = [
            'label' => Yii::t('app/modules/admin', 'Modules'),
            'icon' => FAS::icon('puzzle-piece', ['class' => ['nav-icon']]),
            'url' => ['/admin/modules'],
            'active' => in_array(\Yii::$app->controller->module->id, ['admin']) &&  in_array(\Yii::$app->controller->id, ['modules']),
            'order' => 2,
        ];
        $menu [] =  [
            'label' => Yii::t('app/modules/admin', 'Settings'),
            'icon' => FAS::icon('cogs', ['class' => ['nav-icon']]),
            'active' => in_array(\Yii::$app->controller->module->id, ['admin','options']) &&  in_array(\Yii::$app->controller->action->id, ['index','info']),
            'url' => ['#'],
            'items' => [
                [
                    'label' => Yii::t('app/modules/admin', 'Information'),
                    'icon' => FAS::icon('info-circle', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, ['admin']) &&  in_array(\Yii::$app->controller->action->id, ['info']),
                    'url' => ['/admin/info'],
                    'order' => 1,
                ],
                [
                    'label' => Yii::t('app/modules/admin', 'Options'),
                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                    'url' => ['/admin/options'],
                    'active' => in_array(\Yii::$app->controller->module->id, ['options']) &&  in_array(\Yii::$app->controller->id, ['options']),
                    'order' => 2,
                ],

            ],
            'order' => 3,
        ];
        $menu [] =  [
            'label' => Yii::t('app/modules/admin', 'System'),
            'icon' => FAS::icon('wrench', ['class' => ['nav-icon']]),
            'url' => ['#'],
            'items' => [
                [
                    'label' => Yii::t('app/modules/system', 'Setting'),
                    'icon' => FAS::icon('cog', ['class' => ['nav-icon']]),
                    'url' => ['/admin/system/setting'],
                    'active' => in_array(\Yii::$app->controller->id, ['setting']),
                    'order' => 1,
                ],
                [
                    'label' => Yii::t('app/modules/system', 'Key-storage'),
                    'icon' => FAS::icon('key', ['class' => ['nav-icon']]),
                    'url' => ['/admin/system/key-storage'],
                    'active' => in_array(\Yii::$app->controller->id, ['key-storage']),
                    'order' => 2,
                ],
                [
                    'label' => Yii::t('app/modules/admin', 'Timeline Event'),
                    'icon' => FAS::icon('tasks', ['class' => ['nav-icon']]),
                    'url' => ['/admin/system/timeline-event'],
                    'active' => in_array(\Yii::$app->controller->id, ['timeline-event']),
                    'order' => 3,
                ],
                [
                    'label' => Yii::t('app/modules/system', 'Info'),
                    'icon' => FAS::icon('info', ['class' => ['nav-icon']]),
                    'url' => ['/admin/system/information'],
                    'active' => in_array(\Yii::$app->controller->id, ['information']),
                    'order' => 4,
                ],
                [
                    'label' => Yii::t('app/modules/admin', 'System Log'),
                    'icon' => FAS::icon('history', ['class' => ['nav-icon']]),
                    'url' => ['/admin/system/log/index'],
                    'active' => in_array(\Yii::$app->controller->module->id, ['system']) && in_array(\Yii::$app->controller->id,['log']),
                    'order' => 5,
                ],
                [
                    'label' => Yii::t('app/modules/system', 'Cache'),
                    'icon' => FAS::icon('history', ['class' => ['nav-icon']]),
                    'url' => ['/admin/system/cache/index'],
                    'active' => in_array(\Yii::$app->controller->module->id, ['system']) && in_array(\Yii::$app->controller->id,['cache']),
                    'order' => 5,
                ],
            ],
            'order' => 4,
        ];

        $menu [] =  [
            'label' => Yii::t('app/modules/admin', 'Users'),
            'icon' => FAS::icon('users', ['class' => ['nav-icon']]),
            'url' => ['#'],
            'items' => [
                [
                    'label' => Yii::t('app/modules/admin', 'Users'),
                    'icon' => FAS::icon('user', ['class' => ['nav-icon']]),
                    'badge' => \common\modules\users\models\Users::find()->count(),
                    'badgeBgClass' => 'badge-danger',
                    'url' => ['/admin/users'],
                    'active' => in_array(\Yii::$app->controller->module->id, ['users' ]),
                    'order' => 1,
                ],
                [
                'label' => Yii::t('app/modules/admin', 'CMS Users'),
                'icon' => FAS::icon('users', ['class' => ['nav-icon']]),
                'badge' => \common\modules\users\models\Users::find()->count(),
                'badgeBgClass' => 'badge-danger',
                'url' => ['/cms/admin-user'],
                'active' => in_array(\Yii::$app->controller->module->id, ['cms' ])&& in_array(\Yii::$app->controller->id, ['admin-user' ]),
                'order' => 1,
                ],
                [
                    'label' => Yii::t('app/modules/admin', 'Users phones'),
                    'icon' => FAS::icon('phone', ['class' => ['nav-icon']]),
//                    'badge' => \common\modules\users\models\Users::find()->count(),
                    'badgeBgClass' => 'badge-danger',
                    'url' => ['/admin/cms/admin-user-phone'],
                    'active' => in_array(\Yii::$app->controller->module->id, ['cms' ]) && in_array(\Yii::$app->controller->id, ['admin-user-phone' ]),
                    'order' => 1,
                ],
                [
                    'label' => Yii::t('app/modules/admin', 'Users emails'),
                    'icon' => FAS::icon('ticket-alt', ['class' => ['nav-icon']]),
//                    'badge' => \common\modules\users\models\Users::find()->count(),
                    'badgeBgClass' => 'badge-danger',
                    'url' => ['/admin/cms/admin-user-email'],
                    'active' => in_array(\Yii::$app->controller->module->id, ['cms' ]) && in_array(\Yii::$app->controller->id, ['admin-user-email' ]),
                    'order' => 1,
                ],
                [
                    'label' => Yii::t('app/modules/admin', 'Rbac'),
                    'url' => '#',
                    'icon' => FAS::icon('lock', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, ['rbac','rbc']),
                    'items' => [
                        [
                            'label' => Yii::t('app/modules/rbac', 'CMS Roles'),
                            'url' => ['/rbc/admin-role/'],
                            'icon' => FAS::icon('wrench', ['class' => ['nav-icon']]),
                            'active' => (in_array(\Yii::$app->controller->module->id, ['rbc']) &&  Yii::$app->controller->id == 'admin-role'),
                        ],
                        [
                            'label' => Yii::t('app/modules/rbac', 'CMS Privileges'),
                            'url' => ['/rbc/admin-permission/'],
                            'icon' => FAS::icon('lock', ['class' => ['nav-icon']]),
                            'active' => (in_array(\Yii::$app->controller->module->id, ['rbc']) &&  Yii::$app->controller->id == 'admin-permission'),
                        ],
                        [
                            'label' => Yii::t('app/modules/rbac', 'Roles and permissions'),
                            'url' => [$this->routePrefix . '/rbac/roles/'],
                            'active' => (in_array(\Yii::$app->controller->module->id, ['rbac']) &&  Yii::$app->controller->id == 'roles'),
                        ],
                        [
                            'label' => Yii::t('app/modules/rbac', 'Inheritance rules'),
                            'url' => [$this->routePrefix . '/rbac/childs/'],
                            'active' => (in_array(\Yii::$app->controller->module->id, ['rbac']) &&  Yii::$app->controller->id == 'childs'),
                        ],
                        [
                            'label' => Yii::t('app/modules/rbac', 'Access rules'),
                            'url' => [$this->routePrefix . '/rbac/rules/'],
                            'active' => (in_array(\Yii::$app->controller->module->id, ['rbac']) &&  Yii::$app->controller->id == 'rules'),
                        ],
                        [
                            'label' => Yii::t('app/modules/rbac', 'Access assignments'),
                            'url' => [$this->routePrefix . '/rbac/assignments/'],
                            'active' => (in_array(\Yii::$app->controller->module->id, ['rbac']) &&  Yii::$app->controller->id == 'assignments'),
                        ],
                    ],
                    'order' => 2
                ]
            ],
            'order' => 5,
        ];


        if ( Modules::getModules(true) != null) {
            $menu [] =     [
                'label' => Yii::t('app/modules/admin', 'Modules'),
                'options' => ['class' => 'nav-header'],
            ];


        }



        return ArrayHelper::merge((is_array($this->customSidebarMenu) ? $this->customSidebarMenu : []), $menu);
    }

    /**
     * Return list of dashboard create menu items
     * @return array
     */
    public function getCreateMenuItems()
    {
        return ArrayHelper::merge((is_array($this->customCreateMenu) ? $this->customCreateMenu : []), $this->createMenu);
    }

    /**
     * Check for available updates
     * @return string, remote version
     */
    public function checkUpdates($module_name, $current_version)
    {
        $viewed = array();
        $session = Yii::$app->session;
        $check_updates = $this->getOption('admin.checkForUpdates');

        if(isset($session['viewed-flash']) && is_array($session['viewed-flash']))
            $viewed = $session['viewed-flash'];

        // Get time to expire cache
        if (isset(Yii::$app->params['admin.cacheExpire']))
            $expire = intval(Yii::$app->params['admin.cacheExpire']);
        else
            $expire = $this->cacheExpire;

        if (!$check_updates) {
            Yii::warning('Attention! In the system settings, the ability to check for updates is disabled.', __METHOD__);
            if(!in_array('admin-check-updates', $viewed) && is_array($viewed)) {
                Yii::$app->getSession()->setFlash(
                    'warning',
                    Yii::t('app/modules/admin', 'Attention! In the system settings, the ability to check for updates is disabled.')
                );
                $session['viewed-flash'] = array_merge(array_unique($viewed), ['admin-check-updates']);
            }
            return false;
        }

        if (Yii::$app->user->isGuest || !$module_name || !$current_version)
            return false;

        $status = null;
        $versions = null;
        $remote_version = null;

        if (Yii::$app->getCache()) {
            if (Yii::$app->cache->exists('modules.versions'))
                $versions = Yii::$app->cache->get('modules.versions');

            if (Yii::$app->cache->exists('modules.updates'))
                $status = Yii::$app->cache->get('modules.updates');
        }
        if (isset($versions[$module_name]))
            $remote_version = $versions[$module_name];
/*
        $update_server = 'https://api.github.com';
        if (is_null($remote_version) && !$status == 'sleep' && @get_headers($update_server)) {

            $client = new \yii\httpclient\Client(['baseUrl' => $update_server]);
            $response = $client->get('/repos/'.$module_name.'/releases/latest', [])->setHeaders([
                'User-Agent' => 'Butterfly.CMS',
                'Content-Type' => 'application/json'
            ])->send();

            if ($response->getStatusCode() == 200) {
                $data = \json_decode($response->content);
                $remote_version = $data->tag_name;

                if ($remote_version && $versions)
                    Yii::$app->cache->add('modules.versions', ArrayHelper::merge($versions, [$module_name => $remote_version]), intval($expire));
                elseif ($remote_version)
                    Yii::$app->cache->add('modules.versions', [$module_name => $remote_version], intval($expire));

            } else {

                if ($response->getStatusCode() == 404) {
                    Yii::error('An error occurred while checking for updates for `'.$module_name.'`. 404 - Resource not found.', __METHOD__);
                    Yii::$app->session->setFlash(
                        'error',
                        Yii::t('app/modules/admin', 'An error occurred while checking for updates for `{module}`. 404 - Resource not found.',
                            ['module' => $module_name]
                        )
                    );
                } else if ($response->getStatusCode() == 403) {

                    if (Yii::$app->getCache())
                        Yii::$app->cache->add('modules.updates', 'sleep', intval($expire));

                    Yii::error('An error occurred while checking for updates to one or more modules. 403 - Request limit exceeded.', __METHOD__);
                    if(!in_array('admin-updates-limit', $viewed) && is_array($viewed)) {
                        Yii::$app->getSession()->setFlash(
                            'error',
                            Yii::t('app/modules/admin', 'An error occurred while checking for updates to one or more modules. 403 - Request limit exceeded.')
                        );
                        $session['viewed-flash'] = array_merge(array_unique($viewed), ['admin-updates-limit']);
                    }
                } else if ($response->getStatusCode() == 503) {
                    if (Yii::$app->getCache())
                        Yii::$app->cache->add('modules.updates', 'sleep', intval($expire));

                    Yii::error('An error occurred while checking for updates to one or more modules. 503 - Service is temporarily unavailable.', __METHOD__);
                    if(!in_array('admin-updates-unavailable', $viewed) && is_array($viewed)) {
                        Yii::$app->getSession()->setFlash(
                            'error',
                            Yii::t('app/modules/admin', 'An error occurred while checking for updates to one or more modules. 503 - Service is temporarily unavailable.')
                        );
                        $session['viewed-flash'] = array_merge(array_unique($viewed), ['admin-updates-unavailable']);
                    }
                }

                return false;
            }
        }

        if (!version_compare($remote_version, $current_version, '<='))
            return $remote_version;
        else
*/
            return false;

    }

}