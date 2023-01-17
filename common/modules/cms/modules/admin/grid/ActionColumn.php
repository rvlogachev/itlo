<?php
namespace common\modules\cms\modules\admin\grid;

use common\modules\backend\widgets\DropdownControllerActionsWidget;
use common\modules\cms\modules\admin\controllers\AdminModelEditorController;
use common\modules\cms\modules\admin\widgets\ControllerActions;
use common\modules\cms\modules\admin\widgets\ControllerModelActions;
use yii\base\InvalidConfigException;
use yii\grid\DataColumn;

/**
 * Class ActionColumn
 * @package skeeks\cms\modules\admin\grid
 */
class ActionColumn extends DataColumn
{
    public $filter = false;

    /**
     * @var AdminModelEditorController
     */
    public $controller = null;
    public $isOpenNewWindow = null;
    public $clientOptions = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (!$this->controller) {
            throw new InvalidConfigException("controller - " . \Yii::t('skeeks/cms', "not specified") . ".");
        }

        if (!$this->controller instanceof AdminModelEditorController) {
            //TODO::need interface
            //throw new InvalidConfigException(\Yii::t('skeeks/cms',"{controller} must be inherited from") . ": " . AdminModelEditorController::className());
        }
    }

    /**
     * @inheritdoc
     */
    protected function renderDataCellContent($model, $key, $index)
    {
        //print_r($this->grid->pjax);die;
        //Строемся в гриде который использует pjax
        if ($this->grid->pjax) {
            $this->clientOptions['pjax-id'] = $this->grid->pjax->options['id'];
        }

        $controller = clone $this->controller;
        $controller->model = $model;

        $this->gridDoubleClickAction();

        return DropdownControllerActionsWidget::widget([
            "actions" => $controller->modelActions,
            "isOpenNewWindow" => $this->isOpenNewWindow,
            "clientOptions" => $this->clientOptions,
        ]);
    }

    static public $grids = [];

    protected function gridDoubleClickAction()
    {
        if (!isset(self::$grids[$this->grid->id])) {
            $this->grid->view->registerJs(<<<JS
            $('tr', $("#{$this->grid->id}")).on('dblclick', function()
            {
                $('.sx-row-action', $(this)).click();
            });
JS
            );
            self::$grids[$this->grid->id] = $this->grid->id;
        }
    }
}