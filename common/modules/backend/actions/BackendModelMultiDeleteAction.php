<?php
namespace common\modules\backend\actions;

use common\modules\backend\BackendAction;
use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\modules\sx\helpers\ResponseHelper;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class BackendModelMultiDeleteAction extends BackendModelMultiAction
{
    public function init()
    {
        if (!$this->icon)
        {
            $this->icon = "fa fa-trash";
        }

        if (!$this->confirm)
        {
            $this->confirm = \Yii::t('skeeks/backend', 'Are you sure you want to permanently delete the selected items?');
        }

        if (!$this->name)
        {
            $this->name = \Yii::t('skeeks/backend', "Delete");
        }

        if (!$this->priority)
        {
            $this->priority = 99999;
        }

        parent::init();
    }

    /**
     * @param $model
     * @return bool
     */
    public function eachExecute($model)
    {
        try
        {
            return $model->delete();
        } catch (\Exception $e)
        {
            return false;
        }
    }

}