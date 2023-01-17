<?php

namespace common\modules\disk;
use common\modules\base\BaseModule;
use rmrevin\yii\fontawesome\FAS;
use Yii;
/**
 * file module definition class
 */
class Module extends BaseModule
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\disk\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "index/index";

    /**
     * @var string, the name of module
     */
    public $name = "Disk Manager";

    /**
     * @var string, the description of module
     */
    public $description = "Disk System";

    /**
     * @var string the module version
     */
    private $version = "1.0.0";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 1;
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    /**
     * {@inheritdoc}
     */
    public function dashboardNavItems($createLink = false)
    {
        $items =  [
            'label' => Yii::t('app/modules/disk', 'Disk'),
            'url' => '#',
            'icon' => FAS::icon('paper-plane', ['class' => ['nav-icon']]),
            'active' => (Yii::$app->controller->module->id == 'file'),
            'items' => [
                [
                    'label' => Yii::t('app/modules/disk', 'Disk'),
                    'url' => ['/admin/disk/index'],
                    'icon' => FAS::icon('paper-plane', ['class' => ['nav-icon']]),
                    'active' => (Yii::$app->controller->id == 'inbox'),
                ],
                [
                    'label' => Yii::t('app/modules/disk', 'Manager'),
                    'url' => ['/admin/disk/manager'],
                    'icon' => FAS::icon('file', ['class' => ['nav-icon']]),
                    'active' => (Yii::$app->controller->module->id == 'mails') && (Yii::$app->controller->id == 'manager'),
                ],

            ],
        ];
        return $items;
    }



}
