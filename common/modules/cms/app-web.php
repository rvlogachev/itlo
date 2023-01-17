<?php
use common\modules\cms\modules\composer\config\Builder;
$env = getenv('ENV');
if (!empty($env)) {
    defined('ENV') or define('ENV', $env);
}

require_once(__DIR__ . '/bootstrap.php');

\Yii::beginProfile('Load config app');

if (YII_ENV == 'dev') {
    \Yii::beginProfile('Rebuild config');
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    \common\modules\cms\modules\composer\config\Builder::rebuild();
    \Yii::endProfile('Rebuild config');
}
//

$configFile =   Builder::path('web-' . ENV);

if (!file_exists($configFile)) {
    $configFile =  \common\modules\cms\modules\composer\config\Builder::path('web');
}
$config = (array)require $configFile;
$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../common/config/base.php'),
    require(__DIR__ . '/../../../common/config/web.php'),
    require(__DIR__ . '/../../config/base.php'),
    require(__DIR__ . '/../../config/web.php')
);
\Yii::endProfile('Load config app');

$application = new yii\web\Application($config);
$application->run();
