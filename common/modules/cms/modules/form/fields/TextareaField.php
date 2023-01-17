<?php
namespace common\modules\cms\modules\form\fields;

use common\modules\cms\modules\form\Field;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class TextareaField extends Field
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
        return $field->textarea($this->elementOptions);
    }
}