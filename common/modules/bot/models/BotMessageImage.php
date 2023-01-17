<?php
namespace common\modules\bot\models;

use common\modules\bot\models\BotMessageImageQuery;
use Yii;

/**
 * This is the model class for table "bot_message_image".
 *
 * @property integer $id
 * @property integer $message_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 * @property integer $size
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $order
 *
 * @property BenWidgetText $message
 */
class BotMessageImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bot_message_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id'], 'required'],
            [['message_id', 'size', 'created_at', 'updated_at', 'order'], 'integer'],
            [['path', 'base_url', 'type', 'name'], 'string', 'max' => 255],
            [['message_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\modules\bot\models\WidgetText::className(), 'targetAttribute' => ['message_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message_id' => 'Message ID',
            'path' => 'Path',
            'base_url' => 'Base Url',
            'type' => 'Type',
            'size' => 'Size',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'order' => 'Order',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(\common\modules\bot\models\WidgetText::className(), ['id' => 'message_id']);
    }

    /**
     * @inheritdoc
     * @return BenMessageImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotMessageImageQuery(get_called_class());
    }

    public function getUrl()
    {
        return $this->base_url .'/'. $this->path;
    }
    public function getPath()
    {
        $path = \Yii::getAlias('@storage');
        return $path .'/web/source/'. $this->path;
    }
}