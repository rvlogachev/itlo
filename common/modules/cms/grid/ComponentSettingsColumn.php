<?php
namespace common\modules\cms\grid;

use common\modules\cms\base\Component;
use common\modules\cms\components\Cms;
use common\modules\cms\models\CmsComponentSettings;
use common\modules\cms\models\CmsSite;
use common\modules\users\models\Users;

/**
 * Class LongTextColumnData
 * @package skeeks\cms\grid
 */
class ComponentSettingsColumn extends BooleanColumn
{
    /**
     * @var Component
     */
    public $component = null;

    public $label = 'Наличие настроек';

    /**
     * @inheritdoc
     */
    public function getDataCellValue($model, $key, $index)
    {
        $settings = null;

        if ($this->component === null) {
            return $this->_result(Cms::BOOL_N);
        }

        if ($model instanceof CmsSite) {
            $settings = CmsComponentSettings::findByComponentSite($this->component, $model)->one();
        }

        if ($model instanceof Users) {
            $settings = CmsComponentSettings::findByComponentUser($this->component, $model)->one();
        }

        if ($settings) {
            return $this->_result(Cms::BOOL_Y);
        }

        return $this->_result(Cms::BOOL_N);
    }

    /**
     * @inheritdoc
     */
    protected function _result($value)
    {
        if ($this->trueValue !== true) {
            if ($value == $this->falseValue) {
                return $this->falseIcon;
            } else {
                return $this->trueIcon;
            }
        } else {
            if ($value !== null) {
                return $value ? $this->trueIcon : $this->falseIcon;
            }
            return $this->showNullAsFalse ? $this->falseIcon : $value;
        }

    }
}