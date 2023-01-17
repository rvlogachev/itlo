<?php
namespace common\modules\cms\modules\toolbar\panels;

use common\modules\cms\modules\toolbar\CmsToolbarPanel;
use Yii;

/**
 * Class EditUrlPanel
 * @package skeeks\cms\toolbar\panels
 */
class EditUrlPanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Edit');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@common/modules/cms/modules/toolbar/views/panels/edit-url', ['panel' => $this]);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->toolbar->editUrl;
    }
}
