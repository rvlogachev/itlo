<?php


return [
    'modules' => [
        'users' => [
            'class' => common\modules\users\Module::class,
            'shouldBeActivated' => false,
            'enableLoginByPass' => true,
        ],
        'backend' =>    [
            'class' => 'common\modules\backend\Module',
        ],
        'admin' => [
            'class' => 'common\modules\admin\Module',
            'routePrefix' => 'admin'
        ],
        'adm' => [
            'class' => 'common\modules\cms\modules\backend\Module',
        ],
        'gridview' => ['class' => 'kartik\grid\Module'],
        'storage' => [
            'class' => 'common\modules\cms\components\Storage',
            'components' => [
                'local' => [
                    'class' => 'common\modules\cms\components\storage\ClusterLocal',
                    'priority' => 100,
                ],
            ],
        ],
        'ajaxfileupload' => [
            'class'         => 'common\modules\cms\modules\ajaxfileupload\AjaxFileUploadModule',

            'controllerMap' => [
                'upload' => [
                    'class'                 => 'common\modules\cms\modules\ajaxfileupload\controllers\UploadController',
                    'private_tmp_dir'       => '@runtime/ajaxfileupload',
                ]
            ]
        ],
        'rbc' => [
            'class' => 'common\modules\cms\rbac\Module',
        ]
        ,
        'system' => [
            'class' => common\modules\system\Module::class,
        ],
//        'users' => [
//            'class' => common\modules\users\Module::class,
//        ],
//        'options' => [
//            'class' => common\modules\options\Module::class,
//            'autoloadOptions' => true,
//            'routePrefix' => 'admin'
//        ],
//        'search' => [
//            'class' => common\modules\search\Module::class,
//        ],
//        'terminal' => [
//            'class' => common\modules\terminal\Module::class,
//        ],
//        'chat' => [
//            'class' => common\modules\chat\ChatModule::class
//        ],

//        'widget' => [
//            'class' => backend\modules\widget\Module::class,
//        ],
//        'file' => [
//            'class' => backend\modules\file\Module::class,
//        ],
//
//        'modulemanager' => [
//            'class' => common\modules\modulemanager\Module::class,
//        ],

    ],


];



