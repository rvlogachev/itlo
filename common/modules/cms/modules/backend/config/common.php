<?php
return [
    'bootstrap'  => ['backendAdmin'],

    'components' => [
        'backendAdmin' => [
            'id'               => 'backendAdmin',
            'class'            => '\common\modules\cms\modules\backend\AdminComponent',
            'controllerPrefix' => 'admin',
            'urlRule'          => [
                'urlPrefix' => 'admin',
            ],
        ],

        'i18n' => [
            'translations' => [
                'skeeks/admin' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/admin/messages',
                    'fileMap'  => [
                        'skeeks/admin' => 'main.php',
                    ],
                ],
            ],
        ],
    ],
];