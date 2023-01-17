<?php
namespace common\modules\cms\modules\form2\models;

use common\modules\cms\models\Core;
use common\modules\cms\relatedProperties\models\RelatedElementPropertyModel;
use common\modules\cms\relatedProperties\models\RelatedPropertyEnumModel;
use common\modules\cms\relatedProperties\models\RelatedPropertyModel;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "{{%form2_form_send_property}}".
 *
 * @property integer $id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $property_id
 * @property integer $element_id
 * @property string $value
 * @property integer $value_enum
 * @property string $value_num
 * @property string $description
 *
 * @property Form2FormProperty $property
 * @property Form2FormSend  $element
 */
class Form2FormSendProperty extends RelatedElementPropertyModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%form2_form_send_property}}';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Form2FormProperty::className(), ['id' => 'property_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getElement()
    {
        return $this->hasOne(Form2FormSend::className(), ['id' => 'element_id']);
    }
}