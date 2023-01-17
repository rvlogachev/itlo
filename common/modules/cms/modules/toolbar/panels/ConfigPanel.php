<?php
namespace common\modules\cms\modules\toolbar\panels;

use common\modules\cms\modules\toolbar\CmsToolbarPanel;
use Yii;

/**
 * Class ConfigPanel
 * @package skeeks\cms\toolbar\pnales
 */
class ConfigPanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Configuration');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@common/modules/cms/modules/toolbar/views/panels/config', ['panel' => $this]);
    }

    /**
     * @inheritdoc
     */
    /*public function getDetail()
    {
        return Yii::$app->view->render('panels/config/detail', ['panel' => $this]);
    }*/
}
