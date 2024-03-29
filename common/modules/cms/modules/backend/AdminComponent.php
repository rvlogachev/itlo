<?php
namespace common\modules\cms\modules\backend;

use common\modules\cms\modules\backend\assets\AdminAsset;
use common\modules\cms\modules\backend\form\fields\AdminSelectField;
use common\modules\backend\BackendComponent;
use common\modules\backend\BackendMenu;
use common\modules\cms\IHasPermissions;
use common\modules\cms\modules\admin\filters\AdminLastActivityAccessControl;
use common\modules\cms\modules\form\fields\SelectField;
use common\modules\cms\modules\themeunifyv2\admin\UnifyThemeAdmin;
use yii\base\Application;
use yii\base\Theme;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;

/**
 * Class AdminComponent
 * @package skeeks\cms\admin
 */
class AdminComponent extends BackendComponent
{
    /**
     * @var string
     */
    public $controllerPrefix = "admin";

    /**
     * @var string
     */
    public $accessControl = AdminAccessControl::class;

    /**
     * @var string
     */
    public $defaultRoute = "/admin/admin-index/index";

    /**
     * @var array
     */
    public $urlRule = [
        'urlPrefix' => 'admin',
    ];

    /**
     * Default pjax options
     *
     * @var array
     */
    public $pjax =
        [
            'timeout' => 30000,
        ];

    protected function _run()
    {
        \Yii::$app->errorHandler->errorAction = 'admin/error/error';

        $theme = new UnifyThemeAdmin();
        $theme->pathMap = [
            '@app/views' => [
                '@common/modules/cms/views',
               // '@skeeks/cms/themes/unify/admin/views',
                //'@skeeks/cms/admin/views',
            ],
        ];

        $theme->logoTitle = \Yii::$app->admin->logoTitle;
        if (\Yii::$app->admin->logoSrc) {
            $theme->logoSrc = \Yii::$app->admin->logoSrc;
        }
        $theme->logoHref = Url::to(['/admin/admin-index']);

        $theme->favicon = "";
         UnifyThemeAdmin::initBeforeRender();
        \Yii::$app->view->theme = $theme;

        /*\Yii::$app->view->theme = new Theme([
            'pathMap' => [
                '@app/views' => [
                    //'@skeeks/crm/themes/unifyAdmin/views',
                    '@skeeks/cms/admin/views',
                ],
            ],
        ]);*/

        if ($this->pjax) {
            \Yii::$container->set('yii\widgets\Pjax', $this->pjax);
        }

        \Yii::$app->language = \Yii::$app->admin->languageCode;

        /*\Yii::$container->setDefinitions([
            BackendController::class => \common\modules\modules\cms\form2\controllers\BackendController::class
        ]);*/

        \Yii::$app->on(Application::EVENT_BEFORE_ACTION, function () {
            if (in_array(\Yii::$app->controller->uniqueId, [
                'admin/admin-auth',
            ])) {
                return true;
            }

            if ($behaviorAccess = ArrayHelper::getValue(\Yii::$app->controller->behaviors(), 'access')) {
                $behaviorAccess['class'] =  AdminAccessControl::class;
                \Yii::$app->controller->detachBehavior('access');
                \Yii::$app->controller->attachBehavior('access', $behaviorAccess);
            }

            \Yii::$app->controller->attachBehavior('adminLastActivityAccess', [
                'class' => AdminLastActivityAccessControl::className(),
                'rules' =>
                    [
                        [
                            'allow'         => true,
                            'matchCallback' => function ($rule, $action) {
                                if (\Yii::$app->user->identity->lastAdminActivityAgo > \Yii::$app->admin->blockedTime) {
                                    return false;
                                }

                                if (\Yii::$app->user->identity) {
                                    \Yii::$app->user->identity->updateLastAdminActivity();
                                }

                                return true;
                            },
                        ],
                    ],
            ]);

//            if (\Yii::$app->controller instanceof IHasPermissions && \Yii::$app->controller->permissionNames) {
//                $result = ArrayHelper::merge([
//                    CmsManager::PERMISSION_ADMIN_ACCESS => \Yii::t('skeeks/cms', 'Access to the administration system'),
//                ], \Yii::$app->controller->permissionNames);
//
//                \Yii::$app->controller->setPermissionNames($result);
//            }
        });

        \Yii::$container->setDefinitions(ArrayHelper::merge(
            \Yii::$container->definitions,
            [
                SelectField::class => [
                    'class' => AdminSelectField::class,
                ],
            ]
        ));
        parent::_run();
    }


    /**
     * @return BackendMenu
     */
    public function getMenu()
    {
        if (is_array($this->_menu) || $this->_menu === null) {
            $data = (array)$this->_menu;

            if (!ArrayHelper::getValue($data, 'class')) {
                $data['class'] = BackendMenu::class;
            }

            if ($dataFromFiles = (array)$this->getMenuFilesData()) {
                $dataFromFiles = static::_filesConfigNormalize($dataFromFiles);
            }

            if (ArrayHelper::getValue($data, 'data')) {
                $data['data'] = ArrayHelper::merge($dataFromFiles, $data['data']);
            } else {
                $data['data'] = $dataFromFiles;
            }

            if ($this->isMergeControllerMenu) {
                $data['data'] = ArrayHelper::merge((array)$this->getMenuDataFromControllers(), (array)$data['data']);
            }

            $this->_menu = \Yii::createObject($data);
        }

        return $this->_menu;
    }

    static protected function _filesConfigNormalize($config = [])
    {
        if ($config) {
            foreach ($config as $key => $itemData) {
                if ($label = ArrayHelper::getValue($itemData, 'label')) {
                    ArrayHelper::remove($itemData, 'label');
                    $itemData['name'] = $label;
                }

                if ($image = ArrayHelper::getValue($itemData, 'img')) {
                    ArrayHelper::remove($itemData, 'img');
                    $itemData['image'] = $image;
                }

                if ($code = ArrayHelper::getValue($itemData, 'code')) {
                    ArrayHelper::remove($itemData, 'code');
                    //$itemData['id'] = $code;
                }

                ArrayHelper::remove($itemData, 'enabled');

                if ($items = ArrayHelper::getValue($itemData, 'items')) {
                    if (is_array($items)) {
                        $itemData['items'] = self::_filesConfigNormalize($items);
                    }
                }

                $config[$key] = $itemData;
            }
        }

        return $config;
    }

    protected $_menuFilesData = null;

    /**
     * Scan admin config files
     * @return array
     */
    public function getMenuFilesData()
    {
        \Yii::beginProfile('admin-menu');

        if ($this->_menuFilesData !== null && is_array($this->_menuFilesData)) {
            return (array)$this->_menuFilesData;
        }

        $paths[] = \Yii::getAlias('@common/config/admin/menu.php');
        $paths[] = \Yii::getAlias('@app/config/admin/menu.php');

        foreach (\Yii::$app->extensions as $code => $data) {
            if ($data['alias']) {
                foreach ($data['alias'] as $code => $path) {
                    $adminMenuFile = $path.'/config/admin/menu.php';
                    if (file_exists($adminMenuFile)) {
                        $menuGroups = (array)include_once $adminMenuFile;
                        $this->_menuFilesData = ArrayHelper::merge($this->_menuFilesData, $menuGroups);
                    }
                }
            }
        }

        foreach ($paths as $path) {
            if (file_exists($path)) {
                $menuGroups = (array)include_once $path;
                $this->_menuFilesData = ArrayHelper::merge($this->_menuFilesData, $menuGroups);
            }
        }

        ArrayHelper::multisort($this->_menuFilesData, 'priority');

        if (!$this->_menuFilesData) {
            $this->_menuFilesData = false;
        }

        \Yii::endProfile('admin-menu');

        return (array)$this->_menuFilesData;
    }


    /**
     * @param View|null $view
     */
    public function initJs(View $view = null)
    {
        $options =
            [
                'BlockerImageLoader' => AdminAsset::getAssetUrl('images/loaders/circulare-blue-24_24.GIF'),
                'disableCetainLink'  => false,
                'globalAjaxLoader'   => true,
                'menu'               => [],
            ];

        $options = \yii\helpers\Json::encode($options);

        \Yii::$app->view->registerJs(<<<JS
        (function(sx, $, _)
        {
            /**
            * @type {Admin}
            */
            sx.App = new sx.classes.Admin($options);

        })(sx, sx.$, sx._);
JS
        );
    }

}