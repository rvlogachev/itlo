<?php
namespace common\modules\cms\modules\money\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;


/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class MoneyCurrency extends \common\modules\cms\base\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%money_currency}}';
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        ArrayHelper::remove($behaviors, TimestampBehavior::class);
        ArrayHelper::remove($behaviors, BlameableBehavior::class);

        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code'], 'unique'],
            [['code'], 'validateCode'],
            [['priority'], 'integer'],
            [['is_active'], 'boolean'],
            [['course'], 'number'],
            [['name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'id'        => \Yii::t('skeeks/money', 'ID'),
            'code'      => \Yii::t('skeeks/money', "Currency"),
            'is_active'    => \Yii::t('skeeks/money', 'Active'),
            'course'    => \Yii::t('skeeks/money', "Rate"),
            'name'      => \Yii::t('skeeks/money', "Name"),
            'priority'  => \Yii::t('skeeks/money', 'Priority'),
        ]);
    }


    public function validateCode($attribute)
    {
        if (!preg_match('/^[A-Z]{3}$/', $this->$attribute)) {
            $this->addError($attribute,
                \Yii::t('skeeks/money', 'Use only uppercase letters. Example RUB (3 characters)'));
        }
    }

    static public $models = [];

    /**
     * @param $code
     * @return static
     */
    static public function getByCode($code)
    {
        $data = static::$models;

        if (!$data || !in_array($code, array_keys((array) $data))) {
            static::$models[$code] = static::find()->where(['code' => $code])->one();
        }

        return static::$models[$code];
    }

    public function asText()
    {
        return $this->code . " ($this->name)";
    }

}