<?php
return [
    'modules' => [
        'users' => [
            'class' => common\modules\users\Module::class,
            'controllerNamespace' => 'common\modules\users\controllers\frontend',
            'shouldBeActivated' => false,
            'enableLoginByPass' => true,
        ],
        'media' => [
            'class' => common\modules\media\Module::class,
            'controllerNamespace' => 'common\modules\media\controllers',
        ],
    ],
];
