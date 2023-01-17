<?php
namespace common\modules\cms\modules\toolbar\panels;

use common\modules\cms\modules\toolbar\CmsToolbarPanel;
use Yii;

/**
 * Class UserPanel
 * @package skeeks\cms\toolbar\panels
 */
class UserPanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'User');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@common/modules/cms/modules/toolbar/views/panels/user', ['panel' => $this]);
    }

    /**
     * @inheritdoc
     */
    /*public function getDetail()
    {
        return Yii::$app->view->render('panels/config/detail', ['panel' => $this]);
    }*/
}
