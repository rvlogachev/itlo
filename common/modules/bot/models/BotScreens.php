<?php

namespace common\modules\bot\models;

use common\behaviors\CacheInvalidateBehavior;
use common\modules\bot\models\WidgetText;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "text_block".
 *
 * @property integer $id
 * @property string $key
 * @property string $title
 * @property string $body
 * @property string $expanded
 * @property integer $status
 * @property integer $timeout
 * @property integer $auth
 */
class BotScreens extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;

    public $thumbnail;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bot_screens}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'cacheInvalidate'=>[
                'class'=>CacheInvalidateBehavior::className(),
                'keys'=>[
                    function ($model) {
                        return [
                            self::className(),
                            $model->key
                        ];
                    }
                ]
            ],
            [
                'class' => \common\modules\bot\components\SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute'=>'key',
                'immutable' => true
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'thumbnail',
                'pathAttribute' => 'thumbnail_path',
                'baseUrlAttribute' => 'thumbnail_base_url'
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[  'title'], 'required'],
            [['key'], 'unique'],
            [['thumbnail','platform','state'], 'safe'],
            [['body','buttons','key','platform','state'], 'string'],
            [['status','is_start','parent_id','timeout','auth'], 'integer'],
            [['title', 'key'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'key' => Yii::t('common', 'Ключ'),
            'title' => Yii::t('common', 'Title'),
            'body' => Yii::t('common', 'Body'),
            'status' => Yii::t('common', 'Status'),
            'is_start' => Yii::t('common', 'Стартовый'),
            'timeout' => Yii::t('common', 'Таймаут'),
            'parent_id' => Yii::t('common', 'Родительский экран'),
        ];
    }


    public function getWidgetText()
    {
        return $this->hasMany(WidgetText::className(), ['screens_id' => 'id']);
    }

    public function getUrl()
    {

        if($this->thumbnail_base_url){
            return $this->thumbnail_base_url . '/' . $this->thumbnail_path;
        }else{
            return  '/img/default.jpg';
        }



    }




}
