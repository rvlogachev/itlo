<?php
namespace common\modules\cms\modules\admin\dashboards;

use common\modules\cms\modules\admin\base\AdminDashboardWidget;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * Class AboutCmsDashboard
 * @package skeeks\cms\modules\admin\dashboards
 */
class AboutCmsDashboard extends AdminDashboardWidget
{
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('skeeks/cms', 'Information about SkeekS CMS')
        ]);
    }

    public $viewFile = 'about-cms';
    public $name;

    public function init()
    {
        parent::init();

        if (!$this->name) {
            $this->name = \Yii::t('skeeks/cms', 'Information about SkeekS CMS');
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