<?php
$config = [
    'id' => 'frontend',
    'basePath' => dirname(__DIR__),
    'homeUrl' => Yii::getAlias('@frontendUrl'),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/cryptoparrot',
    'bootstrap' => ['maintenance','cmsToolbar'],
    'on beforeRequest' => function ($event) {
        \Yii::setAlias('template', '@frontend/templates/default');
    },


];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'messageCategory' => 'frontend'
            ]
        ]
    ];
}

return $config;
