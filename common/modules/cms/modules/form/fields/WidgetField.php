<?php
namespace common\modules\cms\modules\form\fields;

use common\modules\cms\modules\form\Field;

/**
 * Class WidgetField
 * @package skeeks\yii2\form\fields
 */
class WidgetField extends Field
{
    /**
     * @var string
     */
    public $widgetClass;

    /**
     * @var array
     */
    public $widgetConfig = [];

    /**
     * @return \yii\widgets\ActiveField
     */
    public function getActiveField()
    {
        $field = parent::getActiveField();
        return $field->widget($this->widgetClass, $this->widgetConfig);
    }
}