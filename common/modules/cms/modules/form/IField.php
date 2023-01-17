<?php
namespace common\modules\cms\modules\form;

use yii\base\Model;
use yii\widgets\ActiveForm;

/**
 * Interface IField
 * @package skeeks\yii2\form
 */
interface IField
{
    /**
     * @return \yii\widgets\ActiveField
     */
    public function getActiveField();

    /**
     * @param Model $model
     * @return $this
     */
    public function setModel(Model $model);

    /**
     * @param string $attribute
     * @return $this
     */
    public function setAttribute($attribute);

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options = []);
}