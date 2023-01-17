<?php

namespace common\modules\stats;

/**
 * Yii2 Statistics
 *
 * @category        Module
 * @version         1.2.5
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-stats
 * @copyright       Copyright (c) 2019 - 2021 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use rmrevin\yii\fontawesome\FAS;
use Yii;
use common\modules\base\BaseModule;
use common\modules\stats\behaviors\ViewBehavior;
use common\modules\stats\behaviors\ControllerBehavior;
use common\modules\helpers\src\StringHelper;
use common\modules\validators\src\SerialValidator;

/**
 * Statistics module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'common\modules\stats\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "visitors/index";

    /**
     * @var string, the name of module
     */
    public $name = "Statistics";

    /**
     * @var string, the description of module
     */
    public $description = "Statistic module";

    /**
     * @var string the module version
     */
    private $version = "1.2.5";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 10;

    /**
     * @var array of strings missing translations
     */
    public $missingTranslation;

    /**
     * Flag, collect statistics
     * @var boolean
     */
    public $collectStats = true;

    /**
     * Flag, collect profiling data
     * @var boolean
     */
    public $collectProfiling = true;

    /**
     * Flag, detect geo location by IP
     * @var boolean
     */
    public $detectLocation = false;

    /**
     * Statistics storage period, days
     * @var integer: 0 - infinity
     */
    public $storagePeriod = 0;

    /**
     * Flag, do not collect statistics in dev mode
     * @var boolean
     */
    public $ignoreDev = false;

    /**
     * Flag, do not collect statistics for ajax-requests
     * @var boolean
     */
    public $ignoreAjax = true;

    /**
     * Flag, use charts for statistic
     * @var boolean
     */
    public $useChart = true;

    /**
     * List of ignored routing
     * @var array
     */
    public $ignoreRoute = ['/admin', '/admin/', '/assets/', '/captcha/'];

    /**
     * List of ignored IP`s
     * @var array
     */
    public $ignoreListIp = [];

    /**
     * List of ignored User Agents
     * @var array
     */
    public $ignoreListUA = [];

    /**
     * Cookie name
     * @var string
     */
    public $cookieName = 'yii2_stats';

    /**
     * Cookie expire time, 1 year
     * @var integer
     */
    public $cookieExpire = 3110400;

    /**
     * MaxMind LicenseKey for GeoLite2 database
     * @see https://blog.maxmind.com/2019/12/18/significant-changes-to-accessing-and-using-geolite2-databases/
     */
    public $maxmindLicenseKey = "";

    /**
     * Advertising Systems
     * @var array
     */
    public $advertisingSystems = ["gclid", "yclid", "fbclid"];

    /**
     * Social Networks
     * @var array
     */
    public $socialNetworks = ["facebook", "vk", "away.vk.com", "ok", "odnoklassniki", "instagram", "twitter", "linkedin", "pinterest", "tumblr", "tumblr", "tumblr", "flickr", "myspace", "meetup", "tagged", "ask.fm", "meetme", "classmates", "loveplanet", "badoo", "twoo", "tinder", "lovoo"];

    /**
     * Search Engines
     * @var array
     */
    public $searchEngines = ["google", "yandex", "mail", "rambler", "yahoo", "bing", "baidu", "aol", "ask", "duckduckgo"];

    /**
     * Client Platforms
     * @var array
     */
    public $clientPlatforms = [
        '/windows nt 10/i' => [
            'title' => 'Windows 10',
            'icon' => 'icon-win-10-os'
        ],
        '/windows nt 6.3/i' => [
            'title' => 'Windows 8.1',
            'icon' => 'icon-win-8-os'
        ],
        '/windows nt 6.2/i' => [
            'title' => 'Windows 8',
            'icon' => 'icon-win-8-os'
        ],
        '/windows nt 6.1/i' => [
            'title' => 'Windows 7',
            'icon' => 'icon-win-7-os'
        ],
        '/windows nt 6.0/i' => [
            'title' => 'Windows Vista',
            'icon' => 'icon-win-7-os'
        ],
        '/windows nt 5.2/i' => [
            'title' => 'Windows Server 2003/XP x64',
            'icon' => 'icon-win-xp-os'
        ],
        '/windows nt 5.1/i' => [
            'title' => 'Windows XP',
            'icon' => 'icon-win-xp-os'
        ],
        '/windows xp/i' => [
            'title' => 'Windows XP',
            'icon' => 'icon-win-xp-os'
        ],
        '/windows nt 5.0/i' => [
            'title' => 'Windows 2000',
            'icon' => 'icon-win-xp-os'
        ],
        '/windows me/i' => [
            'title' => 'Windows ME',
            'icon' => 'icon-win-xp-os'
        ],
        '/win98/i' => [
            'title' => 'Windows 98',
            'icon' => 'icon-win-xp-os'
        ],
        '/win95/i' => [
            'title' => 'Windows 95',
            'icon' => 'icon-win-xp-os'
        ],
        '/win16/i' => [
            'title' => 'Windows 3.11',
            'icon' => 'icon-win-xp-os'
        ],
        '/macintosh|mac os x/i' => [
            'title' => 'Mac OS X',
            'icon' => 'icon-os-x-os'
        ],
        '/mac_powerpc/i' => [
            'title' => 'Mac OS 9',
            'icon' => 'icon-mac-9-os'
        ],
        '/linux/i' => [
            'title' => 'Linux',
            'icon' => 'icon-linux-os'
        ],
        '/ubuntu/i' => [
            'title' => 'Ubuntu',
            'icon' => 'icon-ubuntu-os'
        ],
        '/iphone/i' => [
            'title' => 'iPhone',
            'icon' => 'icon-ios-os'
        ],
        '/ipod/i' => [
            'title' => 'iPod',
            'icon' => 'icon-ios-os'
        ],
        '/ipad/i' => [
            'title' => 'iPad',
            'icon' => 'icon-ios-os'
        ],
        '/android/i' => [
            'title' => 'Android',
            'icon' => 'icon-android-os'
        ],
        '/blackberry/i' => [
            'title' => 'BlackBerry',
            'icon' => 'icon-blackberry-os'
        ],
        '/webos/i' => [
            'title' => 'webOS',
            'icon' => 'icon-web-os'
        ]
    ];

    /**
     * Client Browsers
     * @var array
     */
    public $clientBrowsers = [
        '/msie/i' => [
            'title' => 'Internet Explorer',
            'icon' => 'icon-ie-browser'
        ],
        '/firefox/i' => [
            'title' => 'Firefox',
            'icon' => 'icon-firefox-browser'
        ],
        '/safari/i' => [
            'title' => 'Safari',
            'icon' => 'icon-safari-browser'
        ],
        '/chrome/i' => [
            'title' => 'Chrome',
            'icon' => 'icon-chrome-browser'
        ],
        '/edge/i' => [
            'title' => 'Edge',
            'icon' => 'icon-edge-browser'
        ],
        '/opera/i' => [
            'title' => 'Opera',
            'icon' => 'icon-opera-browser'
        ],
        '/netscape/i' => [
            'title' => 'Netscape',
            'icon' => 'icon-netscape-browser'
        ],
        '/maxthon/i' => [
            'title' => 'Maxthon',
            'icon' => 'icon-maxthon-browser'
        ],
        '/konqueror/i' => [
            'title' => 'Konqueror',
            'icon' => 'icon-konqueror-browser'
        ],
        '/ucbrowser/i' => [
            'title' => 'UC Browser',
            'icon' => 'icon-uc-browser'
        ],
        '/vivaldi/i' => [
            'title' => 'Vivaldi',
            'icon' => 'icon-vivaldi-browser'
        ],
        '/yabrowser/i' => [
            'title' => 'Yandex.Browser',
            'icon' => 'icon-yandex-browser'
        ]
    ];

    /**
     * @var Visitors::class instance (used in collect profiling)
     */
    private $_visitor;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // Set version of current module
        $this->setVersion($this->version);

        // Set priority of current module
        $this->setPriority($this->priority);

        // Autoload system params
        $attributes = [
            'collectStats' => 'boolean',
            'collectProfiling' => 'boolean',
            'detectLocation' => 'boolean',
            'storagePeriod' => 'integer',
            'ignoreDev' => 'boolean',
            'ignoreAjax' => 'boolean',
            'useChart' => 'boolean',
            'ignoreRoute' => 'array',
            'ignoreListIp' => 'array',
            'ignoreListUA' => 'array',
            'cookieName' => 'string',
            'cookieExpire' => 'integer',
            'maxmindLicenseKey' => 'string',
            'advertisingSystems' => 'array',
            'socialNetworks' => 'array',
            'searchEngines' => 'array',
            'clientPlatforms' => 'array',
            'clientBrowsers' => 'array'
        ];

        foreach ($attributes as $attribute => $type) {
            if (isset(Yii::$app->params["stats" . "." . $attribute]) && isset($this->$attribute)) {

                if (\gettype($this->$attribute) == $type)
                    $this->$attribute = Yii::$app->params["stats" . "." . $attribute];

            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function dashboardNavItems($createLink = false)
    {
        return [
            'label' => $this->name,
            'url' => [$this->routePrefix . '/stats/'],
            'icon' => FAS::icon('wrench', ['class' => ['nav-icon']]),'active' => in_array(\Yii::$app->controller->module->id, ['stats']),
            'items' => [
                [
                    'label' => Yii::t('app/modules/stats', 'Visitors'),
                    'url' => [$this->routePrefix . '/stats/'],
                    'icon' => FAS::icon('user', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['stats']) &&  Yii::$app->controller->action->id == 'index'),
                ],
                [
                    'label' => Yii::t('app/modules/stats', 'Robots'),
                    'url' => [$this->routePrefix . '/stats/robots'],
                    'icon' => FAS::icon('user-secret', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['stats']) &&  Yii::$app->controller->action->id == 'robots'),
                ],
                [
                    'label' => Yii::t('app/modules/stats', 'Load'),
                    'url' => [$this->routePrefix . '/stats/load/'],
                    'icon' => FAS::icon('weight', ['class' => ['nav-icon']]),
                    'active' => (in_array(\Yii::$app->controller->module->id, ['load']) &&  Yii::$app->controller->action->id == 'index'),
                ],
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function bootstrap($app)
    {
        parent::bootstrap($app);

        // Add stats behaviors for web app
        if(!($app instanceof \yii\console\Application) && $this->module) {

            // View behavior to render counter
            $app->get('view')->attachBehavior('behaviors/ViewBehavior', [
                'class' => ViewBehavior::class,
            ]);

            // Controller behavior to write stat data
            if ($this->collectStats) {
                $app->attachBehavior('behaviors/ControllerBehavior', [
                    'class' => ControllerBehavior::class,
                ]);
            }

            // Collect profiling data
            if ($this->collectProfiling && $this->collectStats) {
                \yii\base\Event::on(\yii\web\Response::class, \yii\web\Response::EVENT_AFTER_SEND, function ($event) {
                    $db_profiling = Yii::getLogger()->getDbProfiling();
                    $elapsed_time = Yii::getLogger()->getElapsedTime();
                    $memory_usage = memory_get_peak_usage() / (1024 * 1024);

                    $db_dsn = null;
                    if (isset(Yii::$app->getDb()->dsn))
                        $db_dsn = Yii::$app->getDb()->dsn;

                    if (isset(Yii::$app->getDb()->getMaster()->dsn))
                        $db_dsn = Yii::$app->getDb()->getMaster()->dsn;

                    if (isset(Yii::$app->getDb()->getSlave()->dsn))
                        $db_dsn = Yii::$app->getDb()->getSlave()->dsn;

                    if ($visitor = $this->getVisitor()) {

                        $params = [];
                        if (!is_null($visitor->params)) {
                            if (is_array($visitor->params)) {
                                $params = $visitor->params;
                            } else if (is_string($visitor->params) && SerialValidator::isValid($visitor->params)) {
                                $params = unserialize($visitor->params);
                            }
                        }

                        $params['et'] = ($elapsed_time) ? round($elapsed_time, 4) : 0; // sec.
                        $params['mu'] = ($memory_usage) ? round($memory_usage, 2) : 0; // MB
                        $params['dbq'] = ($db_profiling[0]) ? intval($db_profiling[0]) : 0; // queries
                        $params['dbt'] = ($db_profiling[1]) ? round($db_profiling[1], 4) : 0; // sec.
                        $params['dsn'] = ($db_dsn) ? $db_dsn : null; // DSN

                        $visitor->params = serialize($params);
                        $visitor->update();
                    }
                });
            }

        }
    }

    /**
     * Updating GeoIP database from geolite.maxmind.com
     */
    public function updateGeoIP() {
        if ($maxmindLicenseKey = $this->maxmindLicenseKey) {

            $geolitePath = "https://download.maxmind.com/app/geoip_download?edition_id=GeoLite2-Country&license_key=".$maxmindLicenseKey."&suffix=tar.gz";

            $databasePath = __DIR__."/database/";
            if (!file_exists($databasePath) && !is_dir($databasePath))
                \yii\helpers\FileHelper::createDirectory($databasePath, $mode = 0775, $recursive = true);

            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                try {
                    exec('curl -sS "'.$geolitePath.'" > '.$databasePath.'/GeoLite2-Country.tar.gz');
                    $phar = new \PharData($databasePath."/GeoLite2-Country.tar.gz");
                    if ($phar->extractTo($databasePath, null, true)) {
                        $files = \yii\helpers\FileHelper::findFiles($databasePath, [
                            'only' => ['*.mmdb']
                        ]);
                        foreach($files as $file) {
                            $fileName = pathinfo(\yii\helpers\FileHelper::normalizePath($file), PATHINFO_BASENAME);
                            copy($file, $databasePath.$fileName);
                        }
                    }
                    unlink(__DIR__."/database/GeoLite2-Country.tar.gz");
                    Yii::info("OK! GeoIP database updated successful.");
                    return true;
                } catch (Exception $e) {
                    Yii::warning("An error occurred while updating GeoIP database: {error}", ['error' => $e]);
                    return false;
                }
            } else {
                try {
                    exec("curl -sS '".$geolitePath."' > ".$databasePath."GeoLite2-Country.tar.gz");
                    exec("tar -xf ".$databasePath."GeoLite2-Country.tar.gz -C ".$databasePath." --strip-components 1");
                    unlink(__DIR__."/database/GeoLite2-Country.tar.gz");
                    Yii::info("OK! GeoIP database updated successful.");
                    return true;
                } catch (Exception $e) {
                    Yii::warning("An error occurred while updating GeoIP database: {error}", ['error' => $e]);
                    return false;
                }
            }
        } else {
            Yii::warning("Error! You must configure the MaxMind license key first.");
            return 0;
        }
    }

    public function setVisitor($visitor = null) {
        if ($visitor instanceof \yii\db\ActiveRecord) {
            $this->_visitor = $visitor;
        }
    }
    public function getVisitor() {
        return $this->_visitor;
    }
}