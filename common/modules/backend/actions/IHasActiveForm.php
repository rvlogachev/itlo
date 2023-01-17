<?php
namespace common\modules\backend\actions;
use yii\widgets\ActiveForm;

/**
 * @property null|ActiveForm $activeForm read-only;
 * @property string $activeFormClassName;
 *
 * Interface IHasActiveForm
 *
 * @package common\modules\backend\actions
 */
interface IHasActiveForm
{
    /**
     * @param array $config
     *
     * @return ActiveForm
     */
    public function beginActiveForm(array $config = []);

    /**
     * @return mixed
     */
    public function endActiveForm();

    /**
     * @return null|ActiveForm
     */
    public function getActiveForm();
}