<?php
return [
    'components' => [
        'i18n' => [
            'translations' => [
                'skeeks/marketplace' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/modules/cms/modules/marketplace/messages',
                    'fileMap'  => [
                        'skeeks/marketplace' => 'main.php',
                    ],
                ],
            ],
        ],

        'authManager' => [
            'config' => [
                'roles' => [
                    [
                        'name'  => \common\modules\cms\rbac\CmsManager::ROLE_ADMIN,
                        'child' => [
                            //Есть доступ к системе администрирования
                            'permissions' => [
                                "cmsMarketplace/admin-composer-update",
                                "cmsMarketplace/admin-marketplace",
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];