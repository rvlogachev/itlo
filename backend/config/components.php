<?php
return [
    'components' => [
        'unifyThemeSettings' =>     [
            'class' => 'common\modules\cms\modules\themeunify\components\UnifyThemeSettings',
        ],
        'mobileDetect' =>     [
            'class' => 'common\modules\cms\modules\mobiledetect\MobileDetect',
        ],
        'upaBackend' => [
            'id'    => 'upaBackend',
            'class' => 'common\modules\cms\modules\upa\UpaBackendComponent',
        ],
        'admin' => [
            'class' => 'common\modules\cms\modules\backend\components\AdminSettingsComponent',
        ],
        'dashboard' => [
            'class' => 'common\modules\admin\components\Dashboard'
        ],
        'backendAdmin' => [
            'class'             => '\common\modules\cms\modules\backend\AdminComponent',
            'controllerPrefix'  => 'admin',
            'urlRule'           => [
                'urlPrefix' => 'admin' //Префикс админки, то есть путь к админке сайта может быть любой
            ],
//            'allowedIPs' => [
//                '127.0.0.1',
//                '91.219.167.252',
//                '93.186.50.*'
//            ],
            'on beforeRun' => function($event) {
                \Yii::$app->httpBasicAuth->verify();
            }
        ],





        'urlManager' => require __DIR__ . '/_urlManager.php',
        'request' => [
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY'),
            'baseUrl' => env('BACKEND_BASE_URL'),
        ],
//        'user' => [
//            'class' => '\yii\web\User',
//            'identityClass' => 'common\modules\cms\models\CmsUser',
//            'enableAutoLogin' => true,
//            'loginUrl' => ['/backend/web/admin/cms/auth/login'],
//        ],

        'cms' => [
            'class' => '\common\modules\cms\components\Cms',
        ],

//        'errorHandler' => [
//            'errorAction' => 'site/error',
//        ],

        'user'=>[
            'identityClass' => 'common\modules\users\models\Users',
            'enableAutoLogin' => true,
        ],

//        'user' => [
//            'class' => yii\web\User::class,
//            'identityClass' => common\models\User::class,
//            'loginUrl' => ['sign-in/login'],
//            'enableAutoLogin' => true,
//            'as afterLogin' => common\behaviors\LoginTimestampBehavior::class,
//        ],
    ],
];
