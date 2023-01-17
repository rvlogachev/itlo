<?php

namespace common\modules\services\controllers;

use Yii;
use common\modules\services\models\Services;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ServicesController implements the CRUD actions for Tasks model.
 */
class ServicesController extends Controller
{

    public $layout = '@backend/themes/adminlte/views/layouts/common';
    /**
     * {@inheritdoc}
     */
    public $defaultAction = 'index';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'roles' => ['admin'],
                        'allow' => true
                    ],
                ],
            ],
        ];

        // If auth manager not configured use default access control
        if(!Yii::$app->authManager) {
            $behaviors['access'] = [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'roles' => ['@'],
                        'allow' => true
                    ],
                ]
            ];
        }

        return $behaviors;
    }


    /**
     * Lists all services.
     * @return mixed
     */
    public function actionIndex()
    {
        $alerts = array();
        $model = new Services();

        // Get action and target
        $action = trim(Yii::$app->request->get('action'));
        $target = trim(Yii::$app->request->get('target'));


        // Get path for caches
        $cache = '/app/common/runtime';//Yii::$app->cache->cachePath;
        $asset = Yii::$app->basePath.'/web/assets';
        $runtime = Yii::$app->basePath.'/runtime';

        if($action == 'restore' && $target == 'chmod')
        {
            if(YII_ENV_DEV) {
                $writables = [
                    'runtime',
                    'web/assets',
                ];
                $executables = [
                    'yii',
                    'tests/bin/yii',
                ];
            } else {
                $writables = [
                    'runtime',
                    'web/assets',
                ];
                $executables = [
                    'yii',
                ];
            }

            if($model::setChmod(Yii::$app->basePath, $writables, 0777)) {
                $alerts[] = [
                    'type' => 'success',
                    'message' => Yii::t('app/modules/services', 'Writing rights (0777) successfully installed!'),
                ];
            } else {
                $alerts[] = [
                    'type' => 'warning',
                    'message' => Yii::t('app/modules/services', 'Error setting write permissions (0777).'),
                ];
            }

            if($model::setChmod(Yii::$app->basePath, $executables, 0755)) {
                $alerts[] = [
                    'type' => 'success',
                    'message' => Yii::t('app/modules/services', 'Execution rights (0755) successfully installed!'),
                ];
            } else {
                $alerts[] = [
                    'type' => 'warning',
                    'message' => Yii::t('app/modules/services', 'Error setting permissions to execute (0755).'),
                ];
            }
        }

        if($action == 'clear' && $target == 'cache')
        {
            if(Yii::$app->cache->flush()) {
                $alerts[] = [
                    'type' => 'success',
                    'message' => Yii::t('app/modules/services', 'The system cache has been successfully cleared!'),
                ];
            } else {
                $alerts[] = [
                    'type' => 'warning',
                    'message' => Yii::t('app/modules/services', 'Error clearing the system cache.'),
                ];
            }
        } else if($action == 'clear' && $target == 'assets') {
            if($model::clearDir($asset)) {
                $alerts[] = [
                    'type' => 'success',
                    'message' => Yii::t('app/modules/services', 'Web-assets have been successfully cleared!'),
                ];
            } else {
                $alerts[] = [
                    'type' => 'warning',
                    'message' => Yii::t('app/modules/services', 'Error clearing the web-assets cache.'),
                ];
            }
        } else if($action == 'clear' && $target == 'runtime') {
            if($model::clearDir($runtime)) {
                $alerts[] = [
                    'type' => 'success',
                    'message' => Yii::t('app/modules/services', 'Runtime has been successfully cleaned!'),
                ];
            } else {
                $alerts[] = [
                    'type' => 'warning',
                    'message' => Yii::t('app/modules/services', 'Error clearing runtime cache.'),
                ];
            }
        }

        if (class_exists('\common\modules\activity\models\Activity') && $this->module->moduleLoaded('activity')) {
            $activity = new \common\modules\activity\models\Activity();

            if ($action == 'clear' && $target == 'activity') {
                $removed = $activity::deleteAll();
                if ($removed > 0) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Users activity log has been successfully cleaned!'),
                    ];
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error clearing users activity log.'),
                    ];
                }
            }
            $size['activity'] = intval($activity::find()->count());
        }

        if (class_exists('\common\modules\mailer\models\Mails') && $this->module->moduleLoaded('admin/mailer')) {
            $activity = new \common\modules\mailer\models\Mails();

            if ($action == 'clear' && $target == 'mailer') {
                $removed = $activity::deleteAll();
                if ($removed > 0) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Mail cache successfully cleaned!'),
                    ];
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error clearing mail cache.'),
                    ];
                }
            }
            $size['mailer'] = intval($activity::find()->count());
        }

        if (class_exists('\common\modules\stats\models\Visitors') && $this->module->moduleLoaded('stats')) {
            $stats = new \common\modules\stats\models\Visitors();

            if ($action == 'clear' && $target == 'stats') {
                $removed = $stats::deleteAll();
                if ($removed > 0) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Statistics has been successfully cleaned!'),
                    ];
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error clearing statistics.'),
                    ];
                }
            }
            $size['stats'] = intval($stats::find()->count());
        }

        if (class_exists('\common\modules\users\models\Users') && $this->module->moduleLoaded('users')) {
            $users = new \common\modules\users\models\Users();

            if ($action == 'clear' && $target == 'users-unconfirmed') {
                $removed = $users::find()
                    ->where(['status' => $users::USR_STATUS_WAITING])
                    ->andWhere(
                        'updated_at <= NOW() - INTERVAL 1 DAY'
                    )->all();

                $count = 0;
                foreach ($removed as $remove) {
                    if ($remove->delete())
                        $count++;
                }

                if ($count > 0) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Unconfirmed users has been successfully deleted!'),
                    ];
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error deleting unconfirmed users.'),
                    ];
                }
            }

            if ($action == 'clear' && $target == 'users-blocked') {
                $removed = $users::find()
                    ->where([
                        'or',
                        ['status' => $users::USR_STATUS_DELETED],
                        ['status' => $users::USR_STATUS_BLOCKED]
                    ])->all();

                $count = 0;
                foreach ($removed as $remove) {
                    if($remove->delete())
                        $count++;
                }

                if ($count > 0) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Blocked users has been successfully deleted!'),
                    ];
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error deleting blocked users.'),
                    ];
                }
            }

            $size['users']['unconfirmed'] = intval($users::find()
                ->where(['status' => $users::USR_STATUS_WAITING])
                ->andWhere(
                    'updated_at <= NOW() - INTERVAL 1 DAY'
                )->count());

            $size['users']['blocked'] = intval($users::find()
                ->where([
                    'or',
                    ['status' => $users::USR_STATUS_DELETED],
                    ['status' => $users::USR_STATUS_BLOCKED]
                ])->count());

        }

        if (class_exists('\common\modules\api\models\API') && $this->module->moduleLoaded('admin/api')) {
            $clients = new \common\modules\api\models\API();

            if ($action == 'clear' && $target == 'api-disable') {
                if ($clients::updateAll(['status' => $clients::API_CLIENT_STATUS_DISABLED])) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'All clients has been successfully disabled!'),
                    ];
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error disabling clients.'),
                    ];
                }
            }

            if ($action == 'clear' && $target == 'api-delete') {
                $removed = $clients::find()->where(['status' => $clients::API_CLIENT_STATUS_DISABLED])->all();

                $count = 0;
                foreach ($removed as $remove) {
                    if($remove->delete())
                        $count++;
                }

                if ($count > 0) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Disabled clients has been successfully deleted!'),
                    ];
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error deleting disabled clients.'),
                    ];
                }

            }

            if ($action == 'clear' && $target == 'api-tokens') {

                $count = 0;

                $items = $clients::find()->where(['status' => $clients::API_CLIENT_STATUS_ACTIVE])->all();
                foreach ($items as $item) {
                    $item->access_token = $clients->generateAccessToken();
                    if ($item->update())
                        $count++;
                }

                if ($count > 0) {
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Access tokens successfully updated!'),
                    ];
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error updating access tokens.'),
                    ];
                }
            }

            $size['api']['users'] = intval($clients::find()->where(['status' => $clients::API_CLIENT_STATUS_ACTIVE])->count());
            $size['api']['disabled'] = intval($clients::find()->where(['status' => $clients::API_CLIENT_STATUS_DISABLED])->count());
            $size['api']['tokens'] = intval($clients::find()->where(['status' => $clients::API_CLIENT_STATUS_ACTIVE])->count());
        }

        if ($this->module->moduleLoaded('admin/search') && class_exists('\common\modules\search\models\Search') && class_exists('\common\modules\search\models\LiveSearch')) {

            $search = new \common\modules\search\models\Search();
            $live = new \common\modules\search\models\LiveSearch();

            if ($action == 'clear' && $target == 'live-search') {
                if ($live::flushCache())
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Live Search cache has been successfully cleaned!'),
                    ];
                else
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error clearing Live Search cache.'),
                    ];
            } elseif ($action == 'drop' && $target == 'search-index') {
                if ($search::deleteAll())
                    $alerts[] = [
                        'type' => 'success',
                        'message' => Yii::t('app/modules/services', 'Search index has been successfully cleaned!'),
                    ];
                else
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/services', 'Error clearing Search index.'),
                    ];
            }

            $size['search-index'] = intval($search::find()->count());
            $cached = Yii::$app->getCache()->get(md5('live-search'));
            if (is_countable($cached))
                $size['live-search'] = count($cached);
            else
                $size['live-search'] = 0;

        }

        if ($this->module->moduleLoaded('admin/rss')) {
            $cached = Yii::$app->getCache()->get(md5('rss-feed'));
            if (is_countable($cached))
                $size['rss'] = count($cached);
            else
                $size['rss'] = 0;

            if ($action == 'clear' && $target == 'rss') {
                if ($cached = Yii::$app->getCache()) {
                    if ($cached->delete(md5('rss-feed'))) {
                        $alerts[] = [
                            'type' => 'success',
                            'message' => Yii::t('app/modules/rss', 'RSS-feed cache has been successfully flushing!')
                        ];
                    } else {
                        $alerts[] = [
                            'type' => 'warning',
                            'message' => Yii::t('app/modules/rss', 'An error occurred while flushing the RSS-feed cache.')
                        ];
                    }
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/rss', 'Error! Cache component not configured in the application.')
                    ];
                }
            }

        }

        if ($this->module->moduleLoaded('admin/turbo')) {
            $cached = Yii::$app->getCache()->get(md5('yandex-turbo'));
            if (is_countable($cached))
                $size['turbo'] = count($cached);
            else
                $size['turbo'] = 0;

            if ($action == 'clear' && $target == 'turbo') {
                if ($cached = Yii::$app->getCache()) {
                    if ($cached->delete(md5('yandex-turbo'))) {
                        $alerts[] = [
                            'type' => 'success',
                            'message' => Yii::t('app/modules/turbo', 'Turbo-pages cache has been successfully flushing!')
                        ];
                    } else {
                        $alerts[] = [
                            'type' => 'warning',
                            'message' => Yii::t('app/modules/turbo', 'An error occurred while flushing the turbo-pages cache.')
                        ];
                    }
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/turbo', 'Error! Cache component not configured in the application.')
                    ];
                }
            }

        }

        if ($this->module->moduleLoaded('admin/amp')) {
            $cached = Yii::$app->getCache()->get(md5('google-amp'));
            if (is_countable($cached))
                $size['amp'] = count($cached);
            else
                $size['amp'] = 0;

            if ($action == 'clear' && $target == 'amp') {
                if ($cached = Yii::$app->getCache()) {
                    if ($cached->delete(md5('google-amp'))) {
                        $alerts[] = [
                            'type' => 'success',
                            'message' => Yii::t('app/modules/amp', 'AMP pages cache has been successfully flushing!')
                        ];
                    } else {
                        $alerts[] = [
                            'type' => 'warning',
                            'message' => Yii::t('app/modules/amp', 'An error occurred while flushing the AMP pages cache.')
                        ];
                    }
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/amp', 'Error! Cache component not configured in the application.')
                    ];
                }
            }

        }

        if ($this->module->moduleLoaded('admin/sitemap')) {
            $cached = Yii::$app->getCache()->get(md5('sitemap'));
            if (is_countable($cached))
                $size['sitemap'] = count($cached);
            else
                $size['sitemap'] = 0;

            if ($action == 'clear' && $target == 'sitemap') {
                if ($cached = Yii::$app->getCache()) {
                    if ($cached->delete(md5('sitemap'))) {
                        $alerts[] = [
                            'type' => 'success',
                            'message' => Yii::t('app/modules/sitemap', 'Sitemap cache has been successfully flushing!')
                        ];
                    } else {
                        $alerts[] = [
                            'type' => 'warning',
                            'message' => Yii::t('app/modules/sitemap', 'An error occurred while flushing the sitemap cache.')
                        ];
                    }
                } else {
                    $alerts[] = [
                        'type' => 'warning',
                        'message' => Yii::t('app/modules/sitemap', 'Error! Cache component not configured in the application.')
                    ];
                }
            }

        }


        foreach ($alerts as $alert) {
            Yii::$app->getSession()->setFlash($alert['type'], $alert['message']);
        }

        $size['assets'] = $model::formatSize($model::directorySize($asset));
        $size['runtime'] = $model::formatSize($model::directorySize($runtime));
        $size['cache'] = $model::formatSize($model::directorySize($cache));

        if(!empty($action) || !empty($target)) {
            return $this->redirect(['index']);
        } else {
            return $this->render('index', [
                'module' => $this->module,
                'model' => $model,
                'size' => $size
            ]);
        }
    }
}
