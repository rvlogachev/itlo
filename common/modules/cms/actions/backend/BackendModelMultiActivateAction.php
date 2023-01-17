<?php
namespace common\modules\cms\actions\backend;

use common\modules\backend\actions\BackendModelMultiAction;
use common\modules\cms\components\Cms;

class BackendModelMultiActivateAction extends BackendModelMultiAction {

    public $attribute = 'active';
    public $value = Cms::BOOL_Y;

    public function init()
    {
        if (!$this->icon)
        {
            $this->icon = "fas fa-eye";
        }

        if (!$this->name)
        {
            $this->name = \Yii::t('skeeks/cms', "Activate");
        }

        parent::init();
    }

    /**
     * @param $model
     * @return bool
     */
    public function eachExecute($model)
    {
        try {
            $model->{$this->attribute} = $this->value;
            return $model->save(false);
        } catch (\Exception $e) {
            return false;
        }
    }
}
