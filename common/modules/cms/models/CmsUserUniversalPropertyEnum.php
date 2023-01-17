<?php
namespace common\modules\cms\models;

use common\modules\cms\relatedProperties\models\RelatedPropertyEnumModel;

/**
 * This is the model class for table "{{%cms_content_property_enum}}".
 *
 * @property CmsUserUniversalProperty $property
 */
class CmsUserUniversalPropertyEnum extends RelatedPropertyEnumModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_user_universal_property_enum}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), []);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(CmsUserUniversalProperty::className(), ['id' => 'property_id']);
    }
}