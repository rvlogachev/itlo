<?php
namespace common\modules\backend\actions;
use common\modules\backend\controllers\IBackendModelController;
use common\modules\cms\helpers\RequestResponse;
use common\modules\cms\IHasModel;
use common\modules\cms\IHasUrl;
use yii\filters\VerbFilter;

/**
 * @property IBackendModelController|IHasUrl|IHasModel $controller
 *
 * Class BackendModelCreateAction
 * @package common\modules\backend\actions
 */
class BackendModelDeleteAction extends BackendModelAction
{
    public function init()
    {
        $this->request = "ajax";
        $this->method = 'post';

        if (!$this->icon)
        {
            $this->icon = "fa fa-trash";
        }

        if (!$this->priority)
        {
            $this->priority = 99999;
        }

        if (!$this->confirm)
        {
            $this->confirm = \Yii::t('skeeks/backend', 'Are you sure you want to delete this item?');
        }

        if (!$this->name)
        {
            $this->name = \Yii::t('skeeks/backend', "Delete");
        }

        parent::init();


        $this->controller->attachBehavior('action-' . $this->id,
        [
            'class' => VerbFilter::class,
            'actions' =>
            [
                $this->id        => ['post'],
            ],
        ]);
    }

    public function run()
    {
        if ($this->callback)
        {
            return call_user_func($this->callback, $this);
        }

        $model          = $this->controller->model;

        $rr             = new RequestResponse();

        if ($rr->isRequestAjaxPost())
        {
            try
            {
                if ($model->delete())
                {
                    $rr->message = \Yii::t('skeeks/backend', 'Record deleted successfully');
                    $rr->success = true;
                } else
                {
                    $rr->message = \Yii::t('skeeks/backend', 'The entry was not deleted');
                    $rr->success = false;
                }
            } catch (\Exception $e)
            {
                $rr->message = $e->getMessage();
                $rr->success = false;
            }

            return (array) $rr;
        }
    }
}