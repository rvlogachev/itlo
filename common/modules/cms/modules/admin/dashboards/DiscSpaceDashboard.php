<?php
namespace common\modules\cms\modules\admin\dashboards;

use common\modules\cms\modules\admin\base\AdminDashboardWidget;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * Class DiscSpaceDashboard
 * @package skeeks\cms\modules\admin\dashboards
 */
class DiscSpaceDashboard extends AdminDashboardWidget
{
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('skeeks/cms', 'Disk space')
        ]);
    }

    public $viewFile = 'disc-space';
    public $name;

    public function init()
    {
        parent::init();

        if (!$this->name) {
            $this->name = \Yii::t('skeeks/cms', 'Disk space');
        }
    }

    /**
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['name'], 'string'],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'name' => \Yii::t('skeeks/cms', 'Name'),
        ]);
    }

    /**
     * @param ActiveForm $form
     */
    public function renderConfigForm(ActiveForm $form = null)
    {
        echo $form->field($this, 'name');
    }
}