<?php
namespace common\modules\cms\modules\admin\traits;

use common\modules\cms\components\Cms;

/**
 * Class AdminActiveFormTrait
 * @package skeeks\cms\modules\admin\traits
 *
 * @deprecated
 */
trait AdminModelEditorStandartControllerTrait
{

    /**
     * @param $model
     * @param $action
     * @return bool
     */
    public function eachMultiActivate($model, $action)
    {
        try {
            $model->active = Cms::BOOL_Y;
            return $model->save(false);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param $model
     * @param $action
     * @return bool
     */
    public function eachMultiInActivate($model, $action)
    {
        try {
            $model->active = Cms::BOOL_N;
            return $model->save(false);
        } catch (\Exception $e) {
            return false;
        }
    }

}