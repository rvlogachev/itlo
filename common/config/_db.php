<?php

return  [
    'class' => yii\db\Connection::class,
    'dsn' => env('DB_DSN'),
    'username' => env('DB_USERNAME'),
    'password' => env('DB_PASSWORD'),
    'tablePrefix' => env('DB_TABLE_PREFIX'),
    'charset' => env('DB_CHARSET', 'utf8'),
    'enableSchemaCache' => !YII_DEBUG,
];
