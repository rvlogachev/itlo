<?php
return [
    'id' => 'console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'console\controllers',
    'controllerMap' => [
        'command-bus' => [
            'class' => trntv\bus\console\BackgroundBusController::class,
        ],
        'message' => [
            'class' => console\controllers\ExtendedMessageController::class
        ],
        'migrate-system' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/system/migrations',
            'migrationTable' => '{{%migrations_system}}'
        ],
        'migrate-options' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/options/migrations',
            'migrationTable' => '{{%migrations_options}}'
        ],
        'migrate-admin' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/admin/migrations',
            'migrationTable' => '{{%migrations_admin}}'
        ],
        'migrate-cms-admin' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/cms/modules/admin/migrations',
            'migrationTable' => '{{%migrations_cms_admin}}'
        ],
        'migrate-users' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/users/migrations',
            'migrationTable' => '{{%migrations_users}}'
        ],

        'migrate-rbac' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/rbac/migrations',
            'migrationTable' => '{{%migrations_rbac}}'
        ],

        'migrate-translations' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/translations/migrations',
            'migrationTable' => '{{%migrations_translations}}'
        ],
        'migrate-media' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/media/migrations',
            'migrationTable' => '{{%migrations_media}}'
        ],
        'migrate-file' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/file/migrations',
            'migrationTable' => '{{%migrations_files}}'
        ],


        'migrate-activity' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/activity/migrations',
            'migrationTable' => '{{%migrations_activity}}'
        ],
        'migrate-search' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/search/migrations',
            'migrationTable' => '{{%migrations_search}}'
        ],
        'migrate-pages' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/pages/migrations',
            'migrationTable' => '{{%migrations_pages}}'
        ],
        'migrate-blog' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/blog/migrations',
            'migrationTable' => '{{%migrations_blog}}'
        ],
        'migrate-widget' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/widget/migrations',
            'migrationTable' => '{{%migrations_widget}}'
        ],
        'migrate-api' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/api/migrations',
            'migrationTable' => '{{%migrations_api}}'
        ],
        'migrate-bookmarks' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/bookmarks/migrations',
            'migrationTable' => '{{%migrations_bookmarks}}'
        ],
        'migrate-comments' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/comments/migrations',
            'migrationTable' => '{{%migrations_comments}}'
        ],
        'migrate-content' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/content/migrations',
            'migrationTable' => '{{%migrations_content}}'
        ],
        'migrate-forms' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/forms/migrations',
            'migrationTable' => '{{%migrations_forms}}'
        ],
        'migrate-geo' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/geo/migrations',
            'migrationTable' => '{{%migrations_geo}}'
        ],
        'migrate-guard' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/guard/migrations',
            'migrationTable' => '{{%migrations_guard}}'
        ],
        'migrate-likes' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/likes/migrations',
            'migrationTable' => '{{%migrations_likes}}'
        ],
        'migrate-mailer' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/mailer/migrations',
            'migrationTable' => '{{%migrations_mailer}}'
        ],
        'migrate-news' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/news/migrations',
            'migrationTable' => '{{%migrations_news}}'
        ],
        'migrate-newsletters' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/newsletters/migrations',
            'migrationTable' => '{{%migrations_newsletters}}'
        ],
        'migrate-redirects' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/redirects/migrations',
            'migrationTable' => '{{%migrations_redirects}}'
        ],
        'migrate-reposts' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/reposts/migrations',
            'migrationTable' => '{{%migrations_reposts}}'
        ],
        'migrate-rss' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/rss/migrations',
            'migrationTable' => '{{%migrations_rss}}'
        ],
        'migrate-services' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/services/migrations',
            'migrationTable' => '{{%migrations_services}}'
        ],
        'migrate-sitemap' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/sitemap/migrations',
            'migrationTable' => '{{%migrations_sitemap}}'
        ],
        'migrate-stats' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/stats/migrations',
            'migrationTable' => '{{%migrations_stats}}'
        ],
        'migrate-subscribers' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/subscribers/migrations',
            'migrationTable' => '{{%migrations_subscribers}}'
        ],
        'migrate-tasks' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/tasks/migrations',
            'migrationTable' => '{{%migrations_tasks}}'
        ],
        'migrate-tickets' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/tickets/migrations',
            'migrationTable' => '{{%migrations_tickets}}'
        ],
        'migrate-turbo' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/turbo/migrations',
            'migrationTable' => '{{%migrations_turbo}}'
        ],
        'migrate-views' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/views/migrations',
            'migrationTable' => '{{%migrations_views}}'
        ],
        'migrate-votes' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/votes/migrations',
            'migrationTable' => '{{%migrations_votes}}'
        ],
        'migrate-bot' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/bot/migrations',
            'migrationTable' => '{{%migrations_bot}}'
        ],
//        'migrate-prpart' => [
//            'class' => yii\console\controllers\MigrateController::class,
//            'migrationPath' => '@common/modules/prpart/migrations',
//            'migrationTable' => '{{%migrations_prpart}}'
//        ],
        'migrate-chat' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/chat/migrations',
            'migrationTable' => '{{%migrations_chat}}'
        ],

        'migrate-cms' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/cms/migrations',
            'migrationTable' => '{{%migrations_cms}}'
        ],
        'migrate-backend' => [
            'class' => yii\console\controllers\MigrateController::class,
            'migrationPath' => '@common/modules/backend/migrations',
            'migrationTable' => '{{%migrations_backend}}'
        ],
//        'migrate-queue' => [
//            'class' => yii\console\controllers\MigrateController::class,
//            'migrationPath' => '@common/modules/queuemanager/migrations',
//            'migrationTable' => '{{%migrations_queuemanager}}'
//        ],

//        'migrate-integration' => [
//            'class' => yii\console\controllers\MigrateController::class,
//            'migrationPath' => '@common/modules/integration/migrations',
//            'migrationTable' => '{{%migrations_integration}}'
//        ],
//        'migrate-crm' => [
//            'class' => yii\console\controllers\MigrateController::class,
//            'migrationPath' => '@common/modules/crm/migrations',
//            'migrationTable' => '{{%migrations_crm}}'
//        ],
//        'migrate-zadarma' => [
//            'class' => yii\console\controllers\MigrateController::class,
//            'migrationPath' => '@common/modules/zadarma/migrations',
//            'migrationTable' => '{{%migrations_zadarma}}'
//        ],
//        'migrate-miniland' => [
//            'class' => yii\console\controllers\MigrateController::class,
//            'migrationPath' => '@common/modules/miniland/migrations',
//            'migrationTable' => '{{%migrations_miniland}}'
//        ],

    ],
    'modules' => [
        'admin' => [
            'class' => 'common\modules\admin\Module',
        ],
        'users' => [
            'class' => 'common\modules\users\Module',
        ],
        'rbac' => [
            'class' => 'common\modules\rbac\Module',
        ],
        'options' => [
            'class' => 'common\modules\options\Module',
        ],
        'search' => [
            'class' => 'common\modules\search\Module',
        ],
        'terminal' => [
            'class' => 'common\modules\terminal\Module',
        ],
        'pages' => [
            'class' => 'common\modules\pages\Module',
        ],
        'system' => [
            'class' => 'common\modules\system\Module',
        ],
        'translations' => [
            'class' => 'common\modules\translations\Module',
        ],
    ],
];
