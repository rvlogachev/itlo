<?php
namespace common\modules\cms\modules\toolbar\panels;

use common\modules\cms\modules\toolbar\CmsToolbarPanel;
use Yii;

/**
 * Class AdminPanel
 * @package skeeks\cms\toolbar\panels
 */
class AdminPanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Administration system');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@common/modules/cms/modules/toolbar/views/panels/admin', ['panel' => $this]);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return \Yii::$app->user->can(\common\modules\cms\rbac\CmsManager::PERMISSION_ADMIN_ACCESS);
    }
}
