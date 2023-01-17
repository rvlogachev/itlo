<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        'v1/device/measure/<id:\w+>'=>'v1/device/measure',
        'v1/device/read/<id:\w+>'=>'v1/device/read',
        '/user/sethistory'=>'v1/user/sethistory',
        '/user/report'=>'v1/user/report',
    ]
];
