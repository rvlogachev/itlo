<?php
return [

    'rules' => [
        [
            'class' => \common\modules\cms\rbac\AuthorRule::class,
        ],
    ],

    'roles' => [

        [
            'name'        => \common\modules\cms\rbac\CmsManager::ROLE_ROOT,
            'description' => ['common\modules/cms', 'Superuser'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::ROLE_GUEST,
            'description' => ['common\modules/cms', 'Unauthorized user'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::ROLE_ADMIN,
            'description' => ['common\modules/cms', 'Admin'],

            'child' => [
                //Есть доступ к системе администрирования
                'permissions' => [
                    \common\modules\cms\rbac\CmsManager::PERMISSION_ADMIN_ACCESS,
                    \common\modules\cms\rbac\CmsManager::PERMISSION_CONTROLL_PANEL,

                    \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_USER_FILES,
                    \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_COMMON_PUBLIC_FILES,
                    \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_ADDITIONAL_FILES,

                    "cms/admin-settings",
                    "cms/admin-info",

                    "cms/admin-cms-site",
                    "cms/admin-cms-lang",

                    "cms/admin-tree",
                    "cms/admin-tree/new-children",
                    "cms/admin-tree/update",
                    "cms/admin-tree/delete",
                    "cms/admin-tree/delete-multi",
                    "cms/admin-tree/list",
                    "cms/admin-tree/move",
                    "cms/admin-tree/resort",

                    "cms/admin-storage-files",
                    "cms/admin-storage-files/upload",
                    "cms/admin-storage-files/index",
                    "cms/admin-storage-files/update",
                    "cms/admin-storage-files/delete",
                    "cms/admin-storage-files/delete-mult",
                    "cms/admin-storage-files/download",
                    "cms/admin-storage-files/delete-tmp-dir",


                    "cms/admin-user",
                    "cms/admin-user/create",
                    "cms/admin-user/update",
                    "cms/admin-user/update-advanced",
                    "cms/admin-user/delete",
                    "cms/admin-user/delete-multi",
                    "cms/admin-user/activate-multi",
                    "cms/admin-user/deactivate-multi",

                    "cms/admin-storage",
                    "cms/admin-cms-tree-type",
                    "cms/admin-cms-tree-type-property",
                    "cms/admin-cms-tree-type-property-enum",

                    "cms/admin-cms-content-property",
                    "cms/admin-cms-content-property-enum",

                    "cms/admin-cms-user-universal-property",
                    "cms/admin-cms-user-universal-property-enum",
                ],
            ],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::ROLE_MANGER,
            'description' => ['common\modules/cms', 'Manager (access to the administration)'],

            'child' => [


                //Есть доступ к системе администрирования
                'permissions' => [
                    \common\modules\cms\rbac\CmsManager::PERMISSION_ADMIN_ACCESS,
                    \common\modules\cms\rbac\CmsManager::PERMISSION_CONTROLL_PANEL,

                    \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_USER_FILES,
                    \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_COMMON_PUBLIC_FILES,

                    "cms/admin-tree",
                    "cms/admin-tree/new-children",
                    "cms/admin-tree/update",
                    "cms/admin-tree/move",
                    "cms/admin-tree/resort",
                    "cms/admin-tree/delete/own",

                    "cms/admin-storage-files",
                    "cms/admin-storage-files/upload",
                    "cms/admin-storage-files/index",
                    "cms/admin-storage-files/update",
                    "cms/admin-storage-files/download",
                    "cms/admin-storage-files/delete/own",
                    "cms/admin-storage-files/delete-tmp-dir",
                ],
            ],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::ROLE_EDITOR,
            'description' => ['common\modules/cms', 'Editor (access to the administration)'],

            'child' => [

                //Есть доступ к системе администрирования
                'permissions' => [
                    \common\modules\cms\rbac\CmsManager::PERMISSION_ADMIN_ACCESS,
                    \common\modules\cms\rbac\CmsManager::PERMISSION_CONTROLL_PANEL,

                    \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_USER_FILES,
                    \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_COMMON_PUBLIC_FILES,

                    "cms/admin-tree",
                    "cms/admin-tree/new-children",
                    "cms/admin-tree/update/own",
                    "cms/admin-tree/delete/own",
                    "cms/admin-tree/move/own",


                    "cms/admin-storage-files",
                    "cms/admin-storage-files/upload",
                    "cms/admin-storage-files/index/own",
                    "cms/admin-storage-files/delete-tmp-dir/own",
                    "cms/admin-storage-files/download/own",
                    "cms/admin-storage-files/delete/own",
                    "cms/admin-storage-files/update/own",
                ],
            ],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::ROLE_USER,
            'description' => ['common\modules/cms', 'Registered user'],

            //Есть доступ к системе администрирования
            'child'       => [
                'permissions' => [
                    \common\modules\cms\components\Cms::UPA_PERMISSION,
                    \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_USER_FILES,
                ],
            ],

        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::ROLE_APPROVED,
            'description' => ['common\modules/cms', 'Confirmed user'],

            //Есть доступ к системе администрирования
            'permissions' => [
                \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_USER_FILES,
            ],
        ],
    ],

    'permissions' => [
        [
            'name'        =>\common\modules\cms\rbac\CmsManager::PERMISSION_ROOT_ACCESS,
            'description' => ['common\modules/cms', 'Возможности суперадминистратора'],
        ],

        [
            'name'        => \common\modules\cms\components\Cms::UPA_PERMISSION,
            'description' => ['common\modules/cms', 'Доступ к персональной части'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::PERMISSION_ADMIN_ACCESS,
            'description' => ['common\modules/cms', 'Access to system administration'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::PERMISSION_CONTROLL_PANEL,
            'description' => ['common\modules/cms', 'Access to the site control panel'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::PERMISSION_EDIT_VIEW_FILES,
            'description' => ['common\modules/cms', 'The ability to edit view files'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_USER_FILES,
            'description' => ['common\modules/cms', 'Access to personal files'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_COMMON_PUBLIC_FILES,
            'description' => ['common\modules/cms', 'Access to the public files'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::PERMISSION_ELFINDER_ADDITIONAL_FILES,
            'description' => ['common\modules/cms', 'Access to all files'],
        ],

        [
            'name'        => \common\modules\cms\rbac\CmsManager::PERMISSION_ADMIN_DASHBOARDS_EDIT,
            'description' => ['common\modules/cms', 'Access to edit dashboards'],
        ],


        [
            'name'        => 'cms/admin-cms-site',
            'description' => ['common\modules/cms', 'Управление сайтами'],
        ],
        [
            'name'        => 'cms/admin-cms-lang',
            'description' => ['common\modules/cms', 'Управление языками'],
        ],
        [
            'name'        => 'cms/admin-storage-files',
            'description' => ['common\modules/cms', 'Управление языками'],
        ],
        [
            'name'        => 'cms/admin-storage-files/index',
            'description' => ['common\modules/cms', 'Просмотр списка своих файлов'],
        ],
        [
            'name'        => 'cms/admin-storage-files/index/own',
            'description' => ['common\modules/cms', 'Просмотр списка своих файлов'],
        ],
        [
            'name'        => 'cms/admin-tree/resort',
            'description' => ['common\modules/cms', 'Сортировать подразделы'],
        ],
        [
            'name'        => 'cms/admin-tree/new-children',
            'description' => ['common\modules/cms', 'Создать подраздел'],
        ],



        //Управление пользователями
        [
            'name'        => 'cms/admin-user',
            'description' => ['common\modules/cms', 'Управление пользователями'],
        ],

        [
            'name'        => 'cms/admin-user/update',
            'description' => ['common\modules/cms', 'Редактирование данных пользователя'],
        ],

        [
            'name'        => 'cms/admin-user/create',
            'description' => ['common\modules/cms', 'Создать пользователя'],
        ],

        [
            'name'        => 'cms/admin-user/update-advanced',
            'description' => ['common\modules/cms', 'Расширенное редактирование данных пользователя'],
        ],

        [
            'name'        => 'cms/admin-user/delete',
            'description' => ['common\modules/cms', 'Удаление пользователя'],
        ],

        /*[
            'name'        => 'cms/admin-user/update/not-root',
            'description' => ['common\modules/crm', 'Редактирование данных доступного пользователя'],
            'child' => [
                'permissions' => [
                    'cms/admin-user/update',
                ],
            ],
            'ruleName' => \common\modules\cms\rbac\rules\CmsUserNotRootRule::class
        ],*/


    ],


];