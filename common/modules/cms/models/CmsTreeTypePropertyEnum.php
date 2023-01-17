<?php
namespace common\modules\cms\models;

use common\modules\cms\relatedProperties\models\RelatedPropertyEnumModel;

/**
 * This is the model class for table "{{%cms_tree_type_property_enum}}".
 * @property CmsTreeTypeProperty $property
 */
class CmsTreeTypePropertyEnum extends RelatedPropertyEnumModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_tree_type_property_enum}}';
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
        return $this->hasOne(CmsTreeTypeProperty::className(), ['id' => 'property_id']);
    }
}
