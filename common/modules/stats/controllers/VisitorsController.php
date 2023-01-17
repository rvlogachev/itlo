<?php

namespace common\modules\stats\controllers;

use Yii;
use common\modules\stats\models\Visitors;
use common\modules\stats\models\VisitorsSearch;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * VisitorsController implements the CRUD actions for Tasks model.
 */
class VisitorsController extends Controller
{
    public $layout = '@backend/themes/adminlte/views/layouts/common';

    /**
     * {@inheritdoc}
     */
    public $defaultAction = 'index';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'index' => ['GET'],
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'roles' => ['admin'],
                        'allow' => true
                    ],
                ],
            ],
        ];

        // If auth manager not configured use default access control
        if (!Yii::$app->authManager) {
            $behaviors['access'] = [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'roles' => ['@'],
                        'allow' => true
                    ],
                ]
            ];
        } else if ($this->module->moduleExist('admin/rbac')) { // Ok, then we check access according to the rules
            $behaviors['access'] = [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['clear'],
                        'roles' => ['updatePosts'],
                        'allow' => true
                    ], [
                        'roles' => ['viewDashboard'],
                        'allow' => true
                    ],
                ],
            ];
        }

        return $behaviors;
    }

    /**
     * Lists all Visitors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $chartData = [];
        $labels = [];
        $all_visitors = [];
        $unique_visitors = [];
        $output1 = [];
        $output2 = [];

        $searchModel = new VisitorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $visitors = $dataProvider->query->all();

        $reader = null;
        $module = $this->module;
        $clientPlatforms = $module->clientPlatforms;
        $clientBrowsers = $module->clientBrowsers;

        $locale = \Locale::getPrimaryLanguage(Yii::$app->language); // Get short locale string
        if(!$locale)
            $locale = 'en';

        if (!$module->maxmindLicenseKey) {
            Yii::$app->getSession()->setFlash(
                'danger',
                Yii::t(
                    'app/modules/stats',
                    'MaxMind GeoLite2 database update key not specified. Visitor location information will not be available.'
                )
            );
        } else if (!file_exists(__DIR__ .'/../database/GeoLite2-Country.mmdb')) {
            Yii::$app->getSession()->setFlash(
                'danger',
                Yii::t(
                    'app/modules/stats',
                    'Cannot read MaxMind GeoLite2 database file. It may be necessary to update the database from the application console.'
                )
            );
        } else {
            try {
                $reader = new \GeoIp2\Database\Reader(__DIR__ .'/../database/GeoLite2-Country.mmdb', [$locale]);
            } catch (Exception $e) {
                Yii::warning($e->getMessage());
            }
        }

        if ($module->useChart && $searchModel->viewChart && ($searchModel->period == 'today' || $searchModel->period == 'yesterday' || $searchModel->period == 'week' || $searchModel->period == 'month' || $searchModel->period == 'year')) {

            $timezone = \date_default_timezone_get();
            $dateTime = new \DateTime('00:00:00', new \DateTimeZone($timezone));
            $timestamp = $dateTime->getTimestamp();

            if ($searchModel->period == 'today') {
                $format = 'H:i';
                $metrik = 'hours';
                $iterations = 24;
                $timestamp = $dateTime->modify('+1 day')->getTimestamp();
            } else if ($searchModel->period == 'yesterday') {
                $format = 'H:i';
                $metrik = 'hours';
                $iterations = 24;
                $timestamp = $dateTime->getTimestamp();
            } else if ($searchModel->period == 'week') {
                $format = 'd M';
                $metrik = 'days';
                $iterations = 7;
                $timestamp = $dateTime->modify('+2 day')->getTimestamp();
            } else if ($searchModel->period == 'month') {
                $format = 'd M';
                $metrik = 'days';
                $iterations = 31;
                $timestamp = $dateTime->modify('+1 day')->getTimestamp();
            } else if ($searchModel->period == 'year') {
                $format = 'M, Y';
                $metrik = 'months';
                $iterations = 12;
                $timestamp = $dateTime->modify('+1 month')->getTimestamp();
            }

            foreach ($visitors as $visitor) {
                for ($i = 1; $i <= $iterations; $i++) {

                    if($visitor->datetime <= strtotime('-'.$i.' '.$metrik, $timestamp) && $visitor->datetime > strtotime('-'.($i + 1).' '.$metrik, $timestamp))
                        $output1[$i][] = $visitor->datetime;

                    if($visitor->unique == 1 && $visitor->datetime <= strtotime('-'.$i.' '.$metrik, $timestamp) && $visitor->datetime > strtotime('-'.($i + 1).' '.$metrik, $timestamp))
                        $output2[$i][] = $visitor->datetime;

                }
            }

            for ($i = 1; $i <= $iterations; $i++) {

                if($searchModel->period == 'year')
                    $labels[] = date($format, strtotime('-'.($i).' '.$metrik, $timestamp));
                else
                    $labels[] = date($format, strtotime('-'.($i + 1).' '.$metrik, $timestamp));

                if(isset($output1[$i]))
                    $all_visitors[] = count($output1[$i]);
                else
                    $all_visitors[] = 0;

                if(isset($output2[$i]))
                    $unique_visitors[] = count($output2[$i]);
                else
                    $unique_visitors[] = 0;
            }

            $chartData = [
                'labels' => array_reverse($labels),
                'datasets' => [
                    [
                        'label'=> Yii::t('app/modules/stats', 'Views'),
                        'data' => array_values(array_reverse($all_visitors)),
                        'backgroundColor' => [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        'borderColor' => [
                            'rgba(54, 162, 235, 1)'
                        ],
                        'borderWidth' => 1
                    ],
                    [
                        'label'=> Yii::t('app/modules/stats', 'Visitors'),
                        'data' => array_values(array_reverse($unique_visitors)),
                        'backgroundColor' => [
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        'borderColor' => [
                            'rgba(255,99,132,1)'
                        ],
                        'borderWidth' => 1
                    ]
                ]
            ];

            $mapData = [];
            if ($searchModel->viewMap) {
                foreach ($visitors as $visitor) {
                    if ($iso_code = strtoupper($visitor->iso_code)) {
                        if (isset($mapData[$iso_code]))
                            $mapData[$iso_code] += 1;
                        else
                            $mapData[$iso_code] = 1;
                    }
                }
                $mapData['_all'] = count($visitors);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'clientPlatforms' => $clientPlatforms,
            'clientBrowsers' => $clientBrowsers,
            'chartData' => $chartData,
            'mapData' => Json::encode($mapData),
            'module' => $module,
            'reader' => $reader
        ]);
    }

    public function actionView($id)
    {
        $module = Yii::$app->controller->module;
        $clientPlatforms = $module->clientPlatforms;
        $clientBrowsers = $module->clientBrowsers;

        $reader = null;
        $model = self::findModel($id);

        $locale = \Locale::getPrimaryLanguage(Yii::$app->language); // Get short locale string
        if(!$locale)
            $locale = 'en';

        if (!$module->maxmindLicenseKey) {
            Yii::$app->getSession()->setFlash(
                'danger',
                Yii::t(
                    'app/modules/stats',
                    'MaxMind GeoLite2 database update key not specified. Visitor location information will not be available.'
                )
            );
        } else if (!file_exists(__DIR__ .'/../database/GeoLite2-Country.mmdb')) {
            Yii::$app->getSession()->setFlash(
                'danger',
                Yii::t(
                    'app/modules/stats',
                    'Cannot read MaxMind GeoLite2 database file. It may be necessary to update the database from the application console.'
                )
            );
        } else {
            try {
                $reader = new \GeoIp2\Database\Reader(__DIR__ .'/../database/GeoLite2-Country.mmdb', [$locale]);
            } catch (Exception $e) {
                Yii::warning($e->getMessage());
            }
        }

        return $this->renderAjax('view', [
            'clientPlatforms' => $clientPlatforms,
            'clientBrowsers' => $clientBrowsers,
            'model' => $model,
            'module' => $module,
            'reader' => $reader
        ]);
    }

    public function actionClear() {
        if(Visitors::clearOldStats(time())) {
            Yii::info(Yii::t('app/modules/stats', 'Statistics successfully cleared!'));
        } else {
            Yii::warning(Yii::t('app/modules/stats', 'An error occurred while clearing the statistics!'));
        }
        return self::actionIndex();
    }

    /**
     * Finds the Visitors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Visitors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Visitors::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app/modules/stats', 'The requested page does not exist.'));
    }
}
