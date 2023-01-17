<?php

namespace common\modules\bot\models;


use common\behaviors\CacheInvalidateBehavior;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "text_block".
 *
 * @property integer $id
 * @property string $key
 * @property string $title
 * @property string $body
 * @property integer $status
 * @property integer $buttons
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $images
 * @property integer $screens_id
 * @property integer $sort
 * @property integer $media
 */
class WidgetText extends ActiveRecord
{





    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;


    public $attachments;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bot_widget_text}}';
    }

    public function behaviors()
    {
        return [

            [
                'class' => 'trntv\filekit\behaviors\UploadBehavior',
                'filesStorage' => 'fileStorage', // my custom fileStorage from configuration(for properly remove the file from disk)
                'multiple' => true,
                'attribute' => 'attachments',
                'uploadRelation' => 'benMessageImages',
                'pathAttribute' => 'path',
                'baseUrlAttribute' => 'base_url',
                'typeAttribute' => 'type',
                'sizeAttribute' => 'size',
                'nameAttribute' => 'name',
                'orderAttribute' => 'order'
            ],

            TimestampBehavior::className(),
//            'cacheInvalidate' => [
//                'class' => CacheInvalidateBehavior::className(),
//                'cacheComponent' => 'backendCache',
//                'keys' => [
//                    function ($model) {
//                        return [
//                            self::className(),
//                            $model->key
//                        ];
//                    }
//                ]
//            ],



            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'slugAttribute'=>'key',
                'immutable' => true
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {


        $rules = parent::rules();
        $rules[] = [['title'], 'required'];
        $rules[] = [['title'], 'required'];
        $rules[] = [['key'], 'unique'];
        $rules[] = [[ 'buttons', 'key'], 'string'];
        $rules[] = [['status', 'screens_id', 'sort'], 'integer'];
        $rules[] = [['title', 'key'], 'string', 'max' => 255];
        $rules[] = [['body'], 'string', 'max' => 512];
        $rules[] = [['title'], 'required'];
        $rules[] = [['screens_id'], 'exist', 'skipOnError' => true, 'targetClass' => BotScreens::className(), 'targetAttribute' => ['screens_id' => 'id']];
        $rules[] = [['images'], 'image', 'extensions' => 'jpg, jpeg, gif, png', 'on' => ['insert', 'update']];
        $rules[] = [['media'], 'safe',  'on' => ['insert', 'update']];
        $rules[] = [['attachments'], 'safe'];

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ИД'),
            'key' => Yii::t('common', 'Ключ'),
            'title' => Yii::t('common', 'Название'),
            'body' => Yii::t('common', 'Сообщение'),
            'status' => Yii::t('common', 'Статус'),
            'attachments' => Yii::t('common', 'Изображение'),
            'sort' => Yii::t('common', 'Сортировка'),
            'screed_id' => Yii::t('common', 'Экран'),
        ];
    }

    public function getScreens()
    {
        return $this->hasOne(BotScreens::className(), ['id' => 'screens_id']);
    }


    public function getBenMessageImages()
    {
        return $this->hasMany(BotMessageImage::className(), ['message_id' => 'id']);
    }




}
