<?php

namespace common\modules\bot;



use common\modules\base\BaseModule;
use common\modules\bot\modules\catalog\CatalogModule;
use common\modules\bot\modules\expert\ExpertModule;
use common\modules\bot\modules\notify\NotifyModule;
use common\modules\bot\modules\order\OrderModule;
use common\modules\bot\modules\pay\PayModule;
use common\modules\bot\reserve\ReserveModule;
use rmrevin\yii\fontawesome\FAS;
use yii;
use common\models\TimelineEvent;
//use backend\models\SystemLog;


class Module extends BaseModule
{
    public $controllerNamespace = 'common\modules\bot\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = 'bookmarks/index';

    /**
     * @var string, the name of module
     */
    public $name = "Bookmarks";

    /**
     * @var string, the description of module
     */
    public $description = "Bookmarks storage module";

    public $vkToken = "Bookmarks storage module";
    public $fbToken = "Bookmarks storage module";
    public $whatsAppToken = "Bookmarks storage module";
    public $viberToken = "Bookmarks storage module";
    public $telegramToken = "Bookmarks storage module";

    /**
     * @var string the module version
     */
    private $version = "0.0.10";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 10;


    public function init()
    {

        parent::init();

        //        $this->modules = [
        //
        ////            'catalog' => [
        ////                'class' => CatalogModule::className(),
        ////            ],
        ////            'consultant' => [
        ////                'class' => ConsultantModule::className(),
        ////            ],
        ////            'expert' => [
        ////                'class' => ExpertModule::className(),
        ////            ],
        ////            'integration' => [
        ////                'class' => IntegrationModule::className(),
        ////            ],
        ////
        ////            'notify' => [
        ////                'class' =>NotifyModule::className(),
        ////            ],
        ////            'order' => [
        ////                'class' => OrderModule::className(),
        ////            ],
        ////            'pay' => [
        ////                'class' => PayModule::className(),
        ////            ],
        ////            'reserve' => [
        ////                'class' => ReserveModule::className(),
        ////            ],
        //
        //
        //
        //        ];
    }
    public static function getModuleName(){


        return \Yii::t('common', 'bot');

    }
    public function dashboardNavItems($createLink = false)
    {
        $items = [
            'label' => Yii::t('app/modules/bot', 'Bot'),
            'url' => '#',
            'icon' => FAS::icon('users', ['class' => ['nav-icon']]),
           // 'options' => ['class' => 'treeview'],
            'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) ,

            'items' => [

                [
                    'label' => Yii::t('app/modules/bot', 'Screens'),
                    'url' => ['/admin/bot/screens'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'screens'),
                ],
                [
                    'label' => Yii::t('app/modules/bot', 'Message'),
                    'url' => ['/admin/bot/widget-text'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'widget-text'),
                ],
                [
                    'label' => Yii::t('app/modules/bot', 'Buttons'),
                    'url' => ['/admin/bot/buttons'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'buttons'),
                ],
                [
                    'label' => Yii::t('app/modules/bot', 'Conversation'),
                    'url' => ['/admin/bot/conversation'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'conversation'),
                ],
                [
                    'label' => Yii::t('app/modules/bot', 'Users'),
                    'url' => ['/admin/bot/user-bot'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'user-bot'),
                ],
                [
                    'label' => Yii::t('app/modules/bot', 'Logs'),
                    'url' => ['/admin/bot/bot-log'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'bot-log'),
                ],
                [
                    'label' => Yii::t('app/modules/bot', 'Settings'),
                    'url' => ['/admin/bot/bot-settings'],
                    'icon' => FAS::icon('cat', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'bot-settings'),
                ],
                [
                    'label' => Yii::t('app/modules/bot', 'Order'),
                    'url' => ['/admin/bot/bot-order'],
                    'icon' => FAS::icon('dog', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'bot-order'),
                ],
                [
                    'label' => Yii::t('app/modules/bot', 'Tarif'),
                    'url' => ['/admin/bot/bot-tarif'],
                    'icon' => FAS::icon('cat', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'bot-tarif'),
                ],

                [
                    'label' => Yii::t('app/modules/bot', 'News'),
                    'url' => ['/admin/bot/news'],
                    'icon' => FAS::icon('list', ['class' => ['nav-icon']]),
                    'active' => in_array(\Yii::$app->controller->module->id, [$this->id]) && (Yii::$app->controller->id == 'news'),
                ]
            ],
            'order'=> 1


        ];
        return $items;
    }







}
