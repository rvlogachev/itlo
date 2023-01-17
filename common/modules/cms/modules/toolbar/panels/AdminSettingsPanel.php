<?php
namespace common\modules\cms\modules\toolbar\panels;

use common\modules\cms\modules\toolbar\CmsToolbarPanel;
use Yii;

/**
 * Class AdminPanel
 * @package skeeks\cms\toolbar\panels
 */
class AdminSettingsPanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Managing project settings');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@common/modules/cms/modules/toolbar/views/panels/admin-settings', ['panel' => $this]);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return \Yii::$app->user->can('cms/admin-settings');
    }
}
