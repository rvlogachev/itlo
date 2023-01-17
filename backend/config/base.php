<?php
$config =  [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'homeUrl' => Yii::getAlias('@backendUrl'),
    'defaultRoute' => 'admin/admin/index',
    'timeZone' => 'Europe/Moscow',

//    'controllerNamespace' => 'backend\controllers',
//    'as globalAccess' => [
//        'class' => common\behaviors\GlobalAccessBehavior::class,
//        'rules' => [
//            [
//                'controllers' => ['sign-in'],
//                'allow' => true,
//                'roles' => ['?'],
//                'actions' => ['login'],
//            ],
//            [
//                'controllers' => ['sign-in'],
//                'allow' => true,
//                'roles' => ['@'],
//                'actions' => ['logout'],
//            ],
//            [
//                'controllers' => ['site'],
//                'allow' => true,
//                'roles' => ['?', '@'],
//                'actions' => ['error'],
//            ],
//            [
//                'controllers' => ['debug/default'],
//                'allow' => true,
//                'roles' => ['?'],
//            ],
//
//
//
//            [
//                'allow' => true,
//                'roles' => ['manager HR', 'administrator', 'doctor'],
//            ],
//        ],
//    ],
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'templates' => [
                    'yii2-starter-kit' => Yii::getAlias('@backend/themes/adminlte/views/_gii/templates'),
                ],
                'template' => 'yii2-starter-kit',
                'messageCategory' => 'backend',
            ],
        ],
    ];
}

return $config;
