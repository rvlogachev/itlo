<?php
namespace common\modules\cms\models;

use common\modules\cms\components\Cms;
use common\modules\cms\models\behaviors\HasMultiLangAndSiteFields;
use common\modules\cms\models\behaviors\HasStatus;
use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "cms_content_type".
 *
 * @property integer $id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $priority
 * @property string $name
 * @property string $code
 *
 * @property CmsContent[] $cmsContents
 */
class CmsContentType extends Core
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_content_type}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), []);
    }

    public function init()
    {
        parent::init();

        $this->on(self::EVENT_BEFORE_DELETE, [$this, '_actionBeforeDelete']);
    }

    public function _actionBeforeDelete($e)
    {
        if ($this->cmsContents) {
            throw new Exception(\Yii::t('skeeks/cms',
                "Before you delete this type of content you want to delete the contents invested in it"));
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id' => Yii::t('skeeks/cms', 'ID'),
            'created_by' => Yii::t('skeeks/cms', 'Created By'),
            'updated_by' => Yii::t('skeeks/cms', 'Updated By'),
            'created_at' => Yii::t('skeeks/cms', 'Created At'),
            'updated_at' => Yii::t('skeeks/cms', 'Updated At'),
            'priority' => Yii::t('skeeks/cms', 'Priority'),
            'name' => Yii::t('skeeks/cms', 'Name'),
            'code' => Yii::t('skeeks/cms', 'Code'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['created_by', 'updated_by', 'created_at', 'updated_at', 'priority'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 32],
            [['code'], 'unique'],
            [
                'code',
                'default',
                'value' => function($model, $attribute) {
                    return "sx_auto_" . md5(rand(1, 10) . time());
                }
            ],
            [
                'priority',
                'default',
                'value' => function($model, $attribute) {
                    return 500;
                }
            ],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCmsContents()
    {
        return $this->hasMany(CmsContent::className(),
            ['content_type' => 'code'])->orderBy("priority ASC")->andWhere(['active' => Cms::BOOL_Y]);
    }

}