<?php
namespace common\modules\cms\modules\toolbar\panels;

use common\modules\cms\modules\toolbar\CmsToolbarPanel;
use Yii;

/**
 * Class CachePanel
 * @package skeeks\cms\toolbar\panels
 */
class CachePanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Cache management');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@common/modules/cms/modules/toolbar/views/panels/cache', ['panel' => $this]);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return \Yii::$app->user->can('admin/clear');
    }
}
