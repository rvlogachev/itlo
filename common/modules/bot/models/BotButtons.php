<?php

namespace common\modules\bot\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "bot_buttons".
 *
 * @property integer $id
 * @property integer $updated_at
 * @property integer $created_at
 * @property integer $key
 * @property integer $type
 * @property integer $size
 * @property integer $callback_data
 * @property integer $text
 * @property integer $status
 * @property integer $widget_text_id
 * @property integer $color
 *
 * @property WidgetText $widgetText
 */
class BotButtons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bot_buttons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],

            [['type','size','url','callback_data','color' ], 'string'],
            [['updated_at', 'created_at',       'status', 'widget_text_id','request_location','request_contact'], 'integer'],
            [['widget_text_id'], 'exist', 'skipOnError' => true, 'targetClass' => WidgetText::className(), 'targetAttribute' => ['widget_text_id' => 'id']],
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),

            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'text',
                'slugAttribute'=>'callback_data',
                'immutable' => true
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'updated_at' => 'Дата обновления',
            'created_at' => 'Дата создания',
            'key' => 'Ключ',
            'type' => 'Тип ',
            'size' => 'Размер',
            'request_location' => 'Запросить местоположение',
            'request_contact' => 'Запросить телефон',
            'callback_data' => 'УРЛ',
            'text' => 'Текст',
            'status' => 'Статус',
            'widget_text_id' => 'Сообщение',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWidgetText()
    {
        return $this->hasOne(WidgetText::className(), ['id' => 'widget_text_id']);
    }

    /**
     * @inheritdoc
     * @return BotButtonsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotButtonsQuery(get_called_class());
    }
}
