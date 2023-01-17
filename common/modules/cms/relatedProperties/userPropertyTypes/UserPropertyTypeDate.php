<?php
/**
 */

namespace common\modules\cms\relatedProperties\userPropertyTypes;

use common\modules\cms\components\Cms;
use common\modules\cms\models\CmsContentElement;
use common\modules\cms\relatedProperties\PropertyType;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * Class UserPropertyTypeDate
 * @package skeeks\cms\relatedProperties\userPropertyTypes
 */
class UserPropertyTypeDate extends PropertyType
{
    public $code = self::CODE_NUMBER;
    public $name = "";

    /* static public $types = [
         \kartik\datecontrol\DateControl::FORMAT_DATETIME => 'Дата и время',
         \kartik\datecontrol\DateControl::FORMAT_DATE => 'Только дата',
         //\kartik\datecontrol\DateControl::FORMAT_TIME => 'Только время',
     ];*/

    public $type = \kartik\datecontrol\DateControl::FORMAT_DATETIME;

    public function init()
    {
        parent::init();

        if (!$this->name) {
            $this->name = \Yii::t('skeeks/cms', 'Datetime');
        }

    }

    public static function types()
    {
        return [
            \kartik\datecontrol\DateControl::FORMAT_DATETIME => \Yii::t('skeeks/cms', 'Datetime'),
            \kartik\datecontrol\DateControl::FORMAT_DATE => \Yii::t('skeeks/cms', 'Only date'),
            //\kartik\datecontrol\DateControl::FORMAT_TIME => 'Только время',
        ];
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),
            [
                'type' => 'Тип',
            ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(),
            [
                ['type', 'string'],
                ['type', 'in', 'range' => array_keys(self::types())],
            ]);
    }

    /**
     * @return \yii\widgets\ActiveField
     */
    public function renderForActiveForm()
    {
        $field = parent::renderForActiveForm();

        $field->widget(\kartik\datecontrol\DateControl::classname(), [
            'type' => $this->type,
        ]);

        return $field;
    }

    /**
     * @return string
     */
    public function renderConfigForm(ActiveForm $activeForm)
    {
        echo $activeForm->field($this,
            'type')->radioList(\common\modules\cms\relatedProperties\userPropertyTypes\UserPropertyTypeDate::types());
    }

}