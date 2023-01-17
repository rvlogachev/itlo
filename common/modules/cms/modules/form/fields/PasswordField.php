<?php
namespace common\modules\cms\modules\form\fields;

use common\modules\cms\modules\form\Field;

/**
 * Class PasswordField
 * @package skeeks\yii2\form\fields
 */
class PasswordField extends Field
{
    /**
     * @var array
     */
    public $elementOptions = [];

    /**
     * @return \yii\widgets\ActiveField
     */
    public function getActiveField()
    {
        $field = parent::getActiveField();
        return $field->passwordInput($this->elementOptions);
    }
}