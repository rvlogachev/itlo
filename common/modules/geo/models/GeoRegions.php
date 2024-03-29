<?php

namespace common\modules\geo\models;

use Yii;
use \yii\behaviors\TimeStampBehavior;

/**
 * This is the model class for table "geo_regions".
 *
 * @property int $id
 * @property int $country_id
 * @property string $title
 * @property string $slug
 * @property string $created_at
 * @property string $updated_at
 * @property int $is_published
 *
 * @property GeoCities[] $geoCities
 * @property GeoCountries $country
 */
class GeoRegions extends \yii\db\ActiveRecord
{

    /**
     * @var string of translations
     */
    public $translations;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%geo_regions}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    self::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function() {
                    return date("Y-m-d H:i:s");
                }
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_id', 'is_published'], 'integer'],
            [['slug'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 64],
            [['slug'], 'unique'],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeoCountries::class, 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app/modules/geo', 'ID'),
            'country_id' => Yii::t('app/modules/geo', 'Country ID'),
            'title' => Yii::t('app/modules/geo', 'Title'),
            'slug' => Yii::t('app/modules/geo', 'Slug'),
            'created_at' => Yii::t('app/modules/geo', 'Created At'),
            'updated_at' => Yii::t('app/modules/geo', 'Updated At'),
            'is_published' => Yii::t('app/modules/geo', 'Is Published'),
            'translations' => Yii::t('app/modules/geo', 'Translations'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeoCities()
    {
        return $this->hasMany(GeoCities::class, ['region_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(GeoCountries::class, ['id' => 'country_id']);
    }
}
