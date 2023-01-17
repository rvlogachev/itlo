<?php
namespace common\modules\cms\actions\backend;

use common\modules\backend\actions\BackendModelMultiAction;
use common\modules\cms\components\Cms;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class BackendModelMultiDeactivateAction extends BackendModelMultiAction {
    public $attribute = 'active';
    public $value = Cms::BOOL_N;

    public function init()
    {
        if (!$this->icon)
        {
            $this->icon = "fas fa-eye-slash";
        }

        if (!$this->name)
        {
            $this->name = \Yii::t('skeeks/cms', "Deactivate");
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
