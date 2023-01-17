<?php

namespace common\modules\base;

/**
 * Yii2 Base module
 *
 * @category        Module
 * @version         1.3.2
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-base
 * @copyright       Copyright (c) 2019 - 2021 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use function GuzzleHttp\Psr7\str;
use yii\base\BootstrapInterface;
use Yii;
use yii\base\Module;

/**
 * Base module definition class
 */
class BaseModule extends Module implements BootstrapInterface
{

    /**
     * @var string the prefix for routing of module
     */
    public $routePrefix = "admin";

    /**
     * @var string, the name of module
     */
    public $name = "Base module";

    /**
     * @var string, the description of module
     */
    public $description = "Base module interface";

    /**
     * @var string the vendor name of module
     */
    private $vendor = "itlo";

    /**
     * @var string the alias of module base path
     */
    private $alias;

    /**
     * @var array the eta data of current module
     */
    private $meta;

    /**
     * @var string the module version
     */
    private $version = "1.3.2";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 10;

    /**
     * @var array of strings missing translations
     */
    public $missingTranslation;

    /**
     * Private properties of child modules
     * @var array
     */
    private $privateProperties = [
        'name', 'description', 'controllerNamespace', 'defaultRoute', 'routePrefix', 'vendor', 'controllerMap'
    ];

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // Set controller namespace for console commands
        if (Yii::$app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'common\\modules\\' . $this->id . '\commands';
            $this->defaultRoute = 'init';
        }


        // Set alias of module base path
        $this->alias = 'common/modules/'.$this->id;
        $this->setAliases([
            $this->alias => $this->basePath
        ]);

        // Set version of current module
        $this->setVersion($this->version);

        // Set priority of current module
        $this->setPriority($this->priority);

        // Register translations
        $this->registerTranslations();

        // Normalize route prefix
        $this->routePrefixNormalize();

        // Set meta data of current module
        $this->setMetaData();
    }

    /**
     * Get module vendor
     * @return string of current module vendor
     */
    public function getVendor() {
        return $this->vendor;
    }

    /**
     * Get module version
     * @return string of current module version
     */
    public function getVersion() {
        $this->version = parent::getVersion();
        return $this->version;
    }

    /**
     * Set current module version
     * @param $version string
     */
    public function setVersion($version)
    {
        parent::setVersion($version);
        $this->version = $version;
    }

    /**
     * Get module priority
     * @return integer of current module priority
     */
    public function getPriority() {
        return $this->priority;
    }

    /**
     * Set current module priority
     * @param $priority integer
     */
    public function setPriority($priority) {
        $this->priority = $priority;
    }

    /**
     * Get alias
     * @return string of current module alias
     */
    public function getBaseAlias() {
        return $this->alias;
    }

    /**
     * Set meta data
     * @return array of current module meta data
     */
    public function setMetaData() {
        $data = [];
        $module = $this;
        if (isset($module->id)) {
            $data['id'] = $module->id;
            $data['uniqueId'] = $module->getUniqueId();
            $data['name'] = str_replace(Yii::getAlias('@vendor').'/',"", $module->getBasePath());
            $data['label'] = (isset($module->name)) ? $module->name : null;
            $data['version'] = $module->getVersion();
            $data['vendor'] = (isset($module->vendor)) ? $module->vendor : null;
            $data['alias'] = $module->getBaseAlias();
            $data['paths']['basePath'] = $module->getBasePath();
            $data['paths']['controllerPath'] = $module->getControllerPath();
            $data['paths']['layoutPath'] = $module->getLayoutPath();
            $data['paths']['viewPath'] = $module->getViewPath();
            $data['components'] = $module->getComponents();
            $data['parent']['id'] = (isset($module->module->id)) ? $module->module->id : null;
            $data['parent']['uniqueId'] = $module->module->getUniqueId();
            $data['parent']['version'] = $module->module->getVersion();
            $data['parent']['paths']['basePath'] = $module->module->getBasePath();
            $data['parent']['paths']['controllerPath'] = $module->module->getControllerPath();
            $data['parent']['paths']['layoutPath'] = $module->module->getLayoutPath();
            $data['parent']['paths']['viewPath'] = $module->module->getViewPath();
            $data['extensions'] = Yii::$app->extensions;
        }

        $this->meta = $data;
    }

    /**
     * Get meta data
     * @return array of current module meta data
     */
    public function getMetaData() {
        return $this->meta;
    }

    /**
     * Get option from DB, params or module public properties
     * @return mixed of params or current module properties
     */
    public function getOption($option) {
        $value = null;

        if (isset(Yii::$app->options)) {
            if (!$value = Yii::$app->options->get($option)) {

                if (preg_match('/\./', $option)) {
                    $split = explode('.', $option, 2);
                    if (count($split) > 1) {
                        if (!empty($split[0]) && !empty($split[1])) {
                            $option = $split[1];
                        }
                    }
                }

                if (isset(Yii::$app->params[$option]))
                    $value = Yii::$app->params[$option];
                elseif (isset($this->$option))
                    $value = $this->$option;
            }
        } else {

            if (preg_match('/\./', $option)) {
                $split = explode('.', $option, 2);
                if (count($split) > 1) {
                    if (!empty($split[0]) && !empty($split[1])) {
                        $section = $split[0];
                        $option = $split[1];
                    }
                }
            }

            if (isset(Yii::$app->params[$option]))
                $value = Yii::$app->params[$option];
            elseif (isset($this->$option))
                $value = $this->$option;

        }

        if (YII_ENV_DEV) {

            if (isset(Yii::$app->options))
                Yii::debug('Option from options`'.$option.'` is ' . gettype(Yii::$app->options->get('admin.checkForUpdates')) .' and value: '. var_export(Yii::$app->options->get('admin.checkForUpdates'), true));

            if (isset(Yii::$app->params['admin.checkForUpdates']))
                Yii::debug('Option from params`'.$option.'` is ' . gettype(Yii::$app->params['admin.checkForUpdates']) .' and value: '. var_export(Yii::$app->params['admin.checkForUpdates'], true));

            Yii::debug('`'.$option.'` is ' . gettype($value) .' and value: '. var_export($value, true));

        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function afterAction($action, $result)
    {

        // Log missing translations
        if (is_array($this->missingTranslation) && YII_ENV == 'dev')
            Yii::warning('Missing translations: ' . var_export($this->missingTranslation, true), 'i18n');

        $result = parent::afterAction($action, $result);
        return $result;

    }

    /**
     * Registers translations for module
     */
    public function registerTranslations()
    {
        $moduleId = 'base';
        if (!is_null($this->id))
            $moduleId = $this->id;

        Yii::$app->i18n->translations['app/modules/' . $moduleId] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '/app/common/modules/' . $moduleId . '/messages',
            'on missingTranslation' => function ($event) {

                if (YII_ENV == 'dev')
                    $this->missingTranslation[] = $event->message;

            }
        ];


        // Name and description translation of module
        $this->name = Yii::t('app/modules/' . $moduleId, $this->name);
        $this->description = Yii::t('app/modules/' . $moduleId, $this->description);
        
    }

    /**
     * Public translation function, Module::t('app/modules/admin', 'Dashboard');
     * @return string of current message translation
     */
    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('app/modules/' . self::id .'/'. $category, $message, $params, $language);
    }

    /**
     * Normalize route
     * @return string of current route
     */
    public function normalizeRoute($route)
    {
        $route = ltrim($route, '/');
        $route = rtrim($route, '/');
        $route = '/'.$route;
        $route = str_replace('//', '/', $route);
        return $route;
    }

    /**
     * Normalize route prefix
     * @return string of current route prefix
     */
    public function routePrefixNormalize()
    {
        if(!empty($this->routePrefix))
            $this->routePrefix = self::normalizeRoute($this->routePrefix);

        return $this->routePrefix;
    }

    /**
     * Build dashboard navigation items for NavBar
     * @param $options array, if you need to add a custom menu routes, like create, update, etc. item
     * @return array of current module nav items
     */
    public function dashboardNavItems($options = false)
    {
        $items = [
            'label' => $this->name,
            'url' => [$this->routePrefix . '/'. $this->id . ((isset($this->defaultRoute)) ? '/' . $this->defaultRoute : '')],
            'active' => (\Yii::$app->controller->module->id == $this->id) ? true : false
        ];

        if (is_array($options)) {
            foreach ($options as $route => $option) {
                if (is_string($route)) {
                    $items['items'] = [
                        [
                            'label' => (isset($option['label'])) ? $option['label'] : $route,
                            'icon' => (isset($option['icon'])) ? $option['icon'] : null,
                            'url' => [$this->routePrefix . '/' . $this->id . '/' . ltrim($route, '/')],
                            'active' => ((\Yii::$app->controller->module->id == $this->id) && (\Yii::$app->controller->action->id == ltrim($route, '/'))) ? true : false
                        ],
                    ];
                }
            }
        }

        return $items;
    }

    /**
     * Check if module exist
     *
     * @param $id
     * @param bool $returnId
     * @return string
     */
    public function moduleExist($id, $returnId = false)
    {
        // If module configured without parent module, like `admin/...`
        if (!(preg_match('/\/[^\s]+/', $id))) {
            $parent = $this->module->id;
            if ($parent)
                $id = $parent . '/' . $id;
        }

        $isExist = (Yii::$app->hasModule($id));

        if ($returnId && $isExist)
            return $id;

        return $isExist;
    }

    /**
     * Check if module exist and return instance
     *
     * @param $id string, the module name (if the module name does not contain the parent module,
     * it will be assigned from the launch module)
     * @param $returnInstance boolean, the return instance of module
     * @return boolean, null or intance
     */
    public function moduleLoaded($id, $returnInstance = false, $autoLoad = false)
    {
        // If module configured without parent module, like `admin/...`
        if (!(preg_match('/\/[^\s]+/', $id))) {
            $parent = $this->module->id;
            if ($parent)
                $id = $parent . '/' . $id;
        }


        if ($id = $this->moduleExist($id, true)) {
            if ($returnInstance)
                return Yii::$app->getModule($id, $autoLoad);
            else
                return true;
        } else {
            return false;
        }

        return null;
    }

    /**
     * Returns a value indicating whether the current request is made via command line (console).
     *
     * @return bool
     */
    public function isConsole()
    {
        return Yii::$app->request->isConsoleRequest;
    }

    /**
     * Returns a value indicating whether the current request made for admin dashboard.
     *
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function isBackend($onlyAuth = true)
    {
        if ($this->isConsole())
            return true;

        $isBackend = false;

        if (substr(Yii::$app->request->getUrl(), 0, 18) == '/backend/web/admin')
            return true;


        if ($onlyAuth && Yii::$app->getUser()->getIsGuest())
            return false;

        return false;
    }

    public function isRestAPI()
    {
        if ($this->isConsole())
            return false;

        if (Yii::$app->controller instanceof \yii\rest\Controller)
            return true;

        return false;
    }

    /**
     * Bootstrap interface, to be called during application loaded module.
     * @param $app object, the application currently running
     */
    public function bootstrap($app)
    {

        // Get URL path prefix if exist
        if (isset($this->routePrefix))
            $prefix = $this->routePrefix . '/';
        else
            $prefix = '';

        // Add module URL rules
        if ($urlManager = $app->getUrlManager()) {
            $urlManager->addRules([
//                $prefix . '<module:' . $this->id . '>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<module>/<controller>/<action>',
//                $prefix . '<module:' . $this->id . '>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                $prefix . '<module:' . $this->id . '>/<controller:\w+>' => '<module>/<controller>/index',
            ], true);
        }

        // Add short module alias, like `@sitemap` instead of long `@wdmg/sitemap`
        if ($this->id !== 'base') {
            Yii::setAlias('@' . $this->id, Yii::getAlias($this->getBaseAlias()));
        }

        // Get missing translations
        $missingTranslation = $this->missingTranslation;

        // Log missing translations
        if (!($app instanceof \yii\console\Application) && $this->module) {
            \yii\base\Event::on(\yii\base\Controller::class, \yii\base\Controller::EVENT_AFTER_ACTION, function ($event) use ($missingTranslation) {

                // Log missing translations
                if (is_array($missingTranslation) && YII_ENV == 'dev')
                    Yii::warning('Missing translations: ' . var_export($missingTranslation, true), 'i18n');

            });
        }
    }

    /**
     * Register log activity of modules and user actions.
     * Used in controllers.
     *
     * @param $message
     * @param null $event
     * @param null $type
     * @param int $level
     * @see \common\modules\activity\models\Activity
     */
    public function logActivity($message, $event = null, $type = null, $level = 2) {
        if (
            (!empty($message) && !is_null($event)) &&
            class_exists('\common\modules\activity\models\Activity') &&
            $this->moduleLoaded('activity') &&
            isset(Yii::$app->activity)
        ) {
            Yii::$app->activity->set(
                $message,
                $event,
                $type,
                $level
            );
        }
    }

    /**
     * Main method of installation module
     * @see \common\modules\options\models\Options
     *
     * @return boolean, false if install failure
     */
    public function install() {

        if (!($options = Yii::$app->getModule('admin/options')))
            $options = Yii::$app->getModule('options');

        if (!is_null($options) && isset(Yii::$app->options)) {

            $props = get_class_vars(get_class($this));
            foreach ($props as $prop => $value) {

                // Skip private properties of modules
                if (in_array($prop, $this->privateProperties))
                    continue;

                if (is_array($value))
                    Yii::$app->options->set($this->id .'.'. $prop, $value, 'array', null, true, false);
                elseif (is_object($value))
                    Yii::$app->options->set($this->id .'.'. $prop, $value, 'object', null, true, false);
                elseif (is_bool($value))
                    Yii::$app->options->set($this->id .'.'. $prop, ($value) ? 1 : 0, 'boolean', null, true, false);
                else
                    Yii::$app->options->set($this->id .'.'. $prop, $value, null, null, true, false);
            }

            return true;
        }

        return false;
    }

    /**
     * Main method of uninstallation module
     * @return boolean, false if uninstall failure
     */
    public function uninstall() {
        return true;
    }

    /**
     * Runs command in console (CLI) from web-request
     *
     * @param string $command, cli command, like `php yii hello/index`
     * @param bool $await, flag if need wait the return execution output
     * @param bool $cli, flag if need execute system comands
     * @param bool $escape, flag if need to escape shell metacharacters
     * @return null|array
     */
    public function runConsole($command, $await = true, $cli = false, $escape = true)
    {

        ignore_user_abort(true);
        set_time_limit(0);

        $status = null;
        $output = null;

        $cmd = "";
        if (!$cli) {
            $script = Yii::getAlias('@app/yii');
            $cmd = "php " . $script . " " . $command;
        } else {
            $cmd = $command;
        }

        if (!$await) {
            header('Connection: close');
            @ob_end_flush();
            @ob_flush();
            @flush();

            if (session_id())
                session_write_close();

        }

        if ($escape)
            $cmd = escapeshellcmd($cmd);

        if (mb_strtolower(mb_substr(php_uname(), 0, 7)) == "windows" || $cli) {
            $status = popen($cmd . ' 2>&1', 'r');
            $output = '';
            while (!feof($status)) {
                $output .= fgets($status);
            }
            return [pclose($status), trim($output)];
        } else {
            $output = exec($cmd . " > /dev/null 2>&1 &", $status);
            return [$status, trim($output)];
        }
    }
}