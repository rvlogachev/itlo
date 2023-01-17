<?php

use Probe\ProviderFactory;
$config = [
    'components' => [
        'assetManager' => [
            'class' => yii\web\AssetManager::class,
            'linkAssets' => env('LINK_ASSETS'),
            'appendTimestamp' => YII_ENV_DEV,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [
                        'jquery.min.js',
                    ]
                ],

                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [

                    ]
                ],

                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [

                    ]
                ]
            ],
        ],
        'authManager' => [
            'class' => yii\rbac\DbManager::class,
            'cache' => 'cache',
            'assignmentTable' => '{{%rbac_assignments}}',
            'itemChildTable' => '{{%rbac_childs}}',
            'itemTable' => '{{%rbac_roles}}',
            'ruleTable' => '{{%rbac_rules}}'

        ],
        'breadcrumbs' =>    [
            'class' => 'common\modules\cms\components\Breadcrumbs',
        ],
        'cache' => [
            'class' => yii\caching\FileCache::class,
            'cachePath' => '@common/runtime/cache'
        ],
        'commandBus' => [
            'class' => trntv\bus\CommandBus::class,
            'middlewares' => [
                [
                    'class' => trntv\bus\middlewares\BackgroundCommandMiddleware::class,
                    'backgroundHandlerPath' => '@console/yii',
                    'backgroundHandlerRoute' => 'command-bus/handle',
                ]
            ]
        ],
        'formatter' => [
            'class' => yii\i18n\Formatter::class,
            'timeZone' => 'Europe/Moscow',
            'dateFormat' => 'd.MM.Y',
            'timeFormat' => 'H:mm:ss',
            //'datetimeFormat' => 'd.MM.Y HH:mm',
            'datetimeFormat' => 'php:d.m.Y H:i:s ',

//            'defaultTimeZone' => 'UTC',
//            'timeZone'        => 'Europe/Moscow',
        ],
        'glide' => [
            'class' => trntv\glide\components\Glide::class,
            'sourcePath' => '@storage/web/source',
            'cachePath' => '@storage/cache',
            'urlManager' => 'urlManagerStorage',
            'maxImageSize' => env('GLIDE_MAX_IMAGE_SIZE'),
            'signKey' => env('GLIDE_SIGN_KEY')
        ],
        'mailer' => [
            'class' => yii\swiftmailer\Mailer::class,
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => env('ADMIN_EMAIL')
            ]
        ],
        'db' => require __DIR__ . '/_db.php',
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'except' => ['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix' => function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars' => [],
                    'logTable' => '{{%system_log}}'
                ]
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'sourceLanguage' => 'en-US',
                ],
            ],
        ],
        'fileStorage' => [
            'class' => trntv\filekit\Storage::class,
            'baseUrl' => '@storageUrl/source',
            'filesystem' => [
                'class' => common\components\filesystem\LocalFlysystemBuilder::class,
                'path' => '@storage/web/source'
            ],
            'as log' => [
                'class' => common\behaviors\FileStorageLogBehavior::class,
                'component' => 'fileStorage'
            ]
        ],
        'keyStorage' => [
            'class' => common\components\keyStorage\KeyStorage::class
        ],
        'urlManagerBackend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('BACKEND_HOST_INFO'),
                'baseUrl' => env('BACKEND_BASE_URL'),
            ],
            require(Yii::getAlias('@backend/config/_urlManager.php'))
        ),
        'urlManagerFrontend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('FRONTEND_HOST_INFO'),
                'baseUrl' => env('FRONTEND_BASE_URL'),
            ],
            require(Yii::getAlias('@frontend/config/_urlManager.php'))
        ),
        'urlManagerStorage' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => env('STORAGE_HOST_INFO'),
                'baseUrl' => env('STORAGE_BASE_URL'),
            ],
            require(Yii::getAlias('@storage/config/_urlManager.php'))
        ),
        'queue' => [
            'class' => \yii\queue\file\Queue::class,
            'path' => '@common/runtime/queue',
        ],
        'cms' => [
            'class' => '\common\modules\cms\components\Cms',
        ],
        'admin' => [
            'class' => '\common\modules\cms\modules\backend\components\AdminSettingsComponent'
        ],
        'storage' => [
            'class' => 'common\modules\cms\components\Storage',
            'components' => [
                'local' => [
                    'class' => 'common\modules\cms\components\storage\ClusterLocal',
                    'priority' => 100,
                ],
            ],
        ],
        'skeeks' => [
            'class' =>  '\common\modules\cms\Skeeks',
        ],
        'currentSite' => [
            'class' => '\common\modules\cms\components\CurrentSite',
        ],
        'imaging' => [
            'class' => '\common\modules\cms\components\Imaging',
        ],
        'console' => [
            'class' => 'common\modules\cms\components\ConsoleComponent',
        ],
        'templateBoomerang' => [
            'class' => 'common\components\boomerang\TemplateBoomerang',
        ],
        'session' => [
            'class' => \common\modules\cms\mysqlSession\DbSession::class,
        ],
        //        'i18n' => [
        //            'translations' => [
        //                '*' => [
        //                    'class' => yii\i18n\PhpMessageSource::class,
        //                    'basePath' => '@common/messages',
        //                    'fileMap' => [
        //                        'common' => 'common.php',
        //                        'backend' => 'backend.php',
        //                        'frontend' => 'frontend.php',
        //                    ],
        //                    'on missingTranslation' => [backend\modules\translation\Module::class, 'missingTranslation']
        //                ],
        //                /* Uncomment this code to use DbMessageSource */
        //                '*'=> [
        //                    'class' => yii\i18n\DbMessageSource::class,
        //                    'sourceMessageTable'=>'{{%i18n_source_message}}',
        //                    'messageTable'=>'{{%i18n_message}}',
        //                    'enableCaching' => YII_ENV_DEV,
        //                    'cachingDuration' => 3600,
        //                    'on missingTranslation' => [backend\modules\translation\Module::class, 'missingTranslation']
        //                ],
        //
        //            ],
        //        ],
    ],

];

if (YII_ENV_PROD) {
    $config['components']['log']['targets']['email'] = [
        'class' => yii\log\EmailTarget::class,
        'except' => ['yii\web\HttpException:*'],
        'levels' => ['error', 'warning'],
        'message' => ['from' => env('ROBOT_EMAIL'), 'to' => env('ADMIN_EMAIL')]
    ];
}

return $config;
