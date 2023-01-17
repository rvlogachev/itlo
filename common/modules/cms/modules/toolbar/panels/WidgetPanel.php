<?php
namespace common\modules\cms\modules\toolbar\panels;

use common\modules\backend\BackendController;
use common\modules\cms\modules\toolbar\CmsToolbarPanel;
use Yii;
use yii\base\ViewEvent;
use yii\web\View;

/**
 * Class WidgetPanel
 * @package skeeks\cms\toolbar\panels
 */
class WidgetPanel extends CmsToolbarPanel
{
    public function init() {
        parent::init();
    }
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Widgets management');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@common/modules/cms/modules/toolbar/views/panels/widget', ['panel' => $this]);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return \Yii::$app->user->can('cms/admin-settings');
    }
}
