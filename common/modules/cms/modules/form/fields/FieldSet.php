<?php
namespace common\modules\cms\modules\form\fields;

use common\modules\cms\modules\form\Builder;
use common\modules\cms\modules\form\Field;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class FieldSetField
 * @package skeeks\yii2\form\fields
 */
class FieldSet extends Field
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $fields = [];

    /**
     * @return \yii\widgets\ActiveField
     */
    public function render()
    {
        if (!$id = ArrayHelper::getValue($this->_options, 'id')) {
            $id = "sx-form-tab-id-" . md5($this->name);
        }

        if (!$this->name) {
            $this->name = $this->attribute;
        }

        //$builder = clone $this->builder;
        $builder = new Builder([
            'model' => $this->model,
            'models' => $this->builder->models,
            'fields' => $this->fields,
            'activeForm' => $this->activeForm,
        ]);

        echo Html::beginTag('div', [
            'class' => 'sx-form-tab tab-pane',
            'id' => $id,
            'data-name' => $this->name,
            'role' => 'tabpanel',
        ]);

        echo $builder->render();
        echo Html::endTag('div');

    }
}