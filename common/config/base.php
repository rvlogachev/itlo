<?php




$config = [
    'name' => 'CryptoParrot - журнал о технологиях и не только',
    'vendorPath' => __DIR__ . '/../../vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'sourceLanguage' => 'ru-RU',
    'language' => 'ru-RU',
    'bootstrap' => ['cms','log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'container' => [
        'definitions' => [
            \yii\widgets\LinkPager::class => \yii\bootstrap4\LinkPager::class,
        ],
    ],

    'params' => [
        'adminEmail' => env('ADMIN_EMAIL'),
        'senderEmail' => env('SENDER_EMAIL'),
        'senderName' => env('SENDER_NAME'),
        'robotEmail' => env('ROBOT_EMAIL'),
        'availableLocales' => [
            'en-US' => 'English (US)',
            'ru-RU' => 'Русский (РФ)',
            'uk-UA' => 'Українська (Україна)',
            'es' => 'Español',
            'fr' => 'Français',
            'vi' => 'Tiếng Việt',
            'zh-CN' => '简体中文',
            'pl-PL' => 'Polski (PL)',
            'id-ID' => 'Indonesian (Bahasa)',
        ],
    ]


//    'as locale' => [
//        'class' => common\behaviors\LocaleBehavior::class,
//        'enablePreferredLanguage' => true
//    ],
];



if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'allowedIPs' => ['*'],
    ];
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class,
        'allowedIPs' => ['*'],
    ];

    $config['components']['cache'] = [
        'class' => yii\caching\DummyCache::class
    ];
    $config['components']['mailer']['transport'] = [
        'class' => 'Swift_SmtpTransport',
        'host' => env('SMTP_HOST'),
        'port' => env('SMTP_PORT'),
    ];
}

$config['bootstrap'][] = 'common\modules\admin\Bootstrap';


return $config;
