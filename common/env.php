<?php
/**
 * Require helpers
 */
require_once(__DIR__ . '/helpers.php');

/**
 * Load application environment from .env file
 */
$dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

/**
 * Init application constants
 */
defined('YII_DEBUG') or define('YII_DEBUG', env('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', env('YII_ENV', 'prod'));

defined('APP_ENV_GLOBAL_FILE') or define('APP_ENV_GLOBAL_FILE', __DIR__ . '/.env');
//Проверка файла который создается скриптом в момент установки проекта, если он создан, то прочитаются его настройки.
$globalFileInited = APP_ENV_GLOBAL_FILE;
if (file_exists($globalFileInited)) {
    require $globalFileInited;
}