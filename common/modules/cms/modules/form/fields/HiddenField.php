<?php
namespace common\modules\cms\modules\form\fields;

use common\modules\cms\modules\form\Field;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class HiddenField extends Field
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
        return $field->hiddenInput($this->elementOptions);
    }
}