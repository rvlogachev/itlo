<?php
namespace common\modules\cms\modules\backend\form\fields;

use common\modules\cms\modules\chosen\Chosen;
use skeeks\yii2\form\fields\SelectField;
use yii\helpers\ArrayHelper;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class AdminSelectField extends SelectField
{
    public $widgetConfig = [];

    public function getActiveField()
    {
        $field = parent::getActiveField();

        if ($this->multiple) {
            $this->elementOptions['multiple'] = $this->multiple;
        }

        if (!$this->multiple && !isset($this->elementOptions['size'])) {
            $this->elementOptions['size'] = 1;
        }

        $items = $this->getItems();
        ArrayHelper::remove($items, null);

        $resultOptions = ArrayHelper::merge([
            'items'         => $items,
            'clientOptions' => [
                'search_contains' => true,
            ],
            'multiple'      => $this->multiple,
            'options'       => $this->elementOptions,
        ], $this->widgetConfig);

        return $field->widget(
            Chosen::class,
            $resultOptions
        );

        return $field;
    }
}