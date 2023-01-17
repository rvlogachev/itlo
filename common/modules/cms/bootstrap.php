<?php
require(__DIR__ . '/global.php');

require(VENDOR_DIR . '/autoload.php');
require(VENDOR_DIR . '/yiisoft/yii2/Yii.php');

\Yii::setAlias('@root', ROOT_DIR);
\Yii::setAlias('@vendor', VENDOR_DIR);