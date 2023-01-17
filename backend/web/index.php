<?php
// Composer
require(__DIR__ . '/../../vendor/autoload.php');

// Environment
require(__DIR__ . '/../../common/env.php');

// Yii
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');

// Bootstrap application
require(__DIR__ . '/../../common/config/bootstrap.php');


$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/base.php'),
    require(__DIR__ . '/../../common/config/components.php'),
    require(__DIR__ . '/../../common/config/modules.php'),
    require(__DIR__ . '/../config/base.php'),
    require(__DIR__ . '/../config/components.php'),
    require(__DIR__ . '/../config/modules.php')
);

(new yii\web\Application($config))->run();
