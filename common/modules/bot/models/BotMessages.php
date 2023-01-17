<?php

namespace common\modules\bot\models;

use common\behaviors\CacheInvalidateBehavior;
use common\components\CustomUploadBehavior;
use common\components\CustomUploadImageBehavior;

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
class BotMessages extends ActiveRecord
{





    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 0;


    public $attachments;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bot_messages}}';
    }

    public function behaviors()
    {
        return [
//            [
//                'class' => CustomUploadImageBehavior::className(),
//                'attribute' => 'images',
//                'scenarios' => ['insert', 'update'],
//                'placeholder' => '@storage/web/source/noimage.png',
//                'path' => '@storage/web/source/user',
//                'url' => '@storageUrl/source/user',
//                'thumbs' => [
//                    'thumb' => ['width' => 400, 'quality' => 90],
//                    'preview' => ['width' => 200, 'height' => 200],
//                    'news_thumb' => ['width' => 200, 'height' => 200, 'bg_color' => '000'],
//                ],
//            ],
//            [
//                'class' => CustomUploadBehavior::className(),
//                'attribute' => 'media',
//                'placeholder' => '@storage/web/source/nomedia.mp4',
//                'scenarios' => ['insert', 'update'],
//                'path' => '@storage/web/source/user',
//                'url' => '@storageUrl/source/user',
//            ],

            'file' => [
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
            'cacheInvalidate' => [
                'class' => CacheInvalidateBehavior::className(),
                'cacheComponent' => 'backendCache',
                'keys' => [
                    function ($model) {
                        return [
                            self::className(),
                            $model->key
                        ];
                    }
                ]
            ],
            TimestampBehavior::className(),

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
        $rules[] = [['body', 'buttons', 'key'], 'string'];
        $rules[] = [['status', 'screens_id', 'sort'], 'integer'];
        $rules[] = [['title', 'key'], 'string', 'max' => 255];
        $rules[] = [['title'], 'required'];
        $rules[] = [['screens_id'], 'exist', 'skipOnError' => true, 'targetClass' => Screens::className(), 'targetAttribute' => ['screens_id' => 'id']];
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
            'id' => Yii::t('common', 'ID'),
            'key' => Yii::t('common', 'Key'),
            'title' => Yii::t('common', 'Title'),
            'body' => Yii::t('common', 'Body'),
            'status' => Yii::t('common', 'Active'),
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
