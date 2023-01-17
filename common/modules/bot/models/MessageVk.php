<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "message_vk".
 *
 * @property int $id
 * @property int $date
 * @property string $type
 * @property int $from_id
 * @property int $random_id
 * @property int $message_id
 * @property int $out
 * @property int $peer_id
 * @property string $text
 * @property int $conversation_message_id
 * @property string $fwd_messages
 * @property int $important
 * @property string $attachments
 * @property string $payload
 * @property int $is_hidden
 * @property int $group_id
 * @property int $response
 * @property string $keyboard
 * @property string $inout
 */
class MessageVk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bot_message_vk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'from_id', 'random_id', 'message_id', 'out', 'peer_id', 'conversation_message_id', 'important', 'is_hidden', 'group_id', 'response'], 'integer'],
            [['type', 'text', 'fwd_messages', 'attachments', 'payload', 'keyboard', 'inout'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'type' => 'Type',
            'from_id' => 'From ID',
            'random_id' => 'Random ID',
            'message_id' => 'Message ID',
            'out' => 'Out',
            'peer_id' => 'Peer ID',
            'text' => 'Text',
            'conversation_message_id' => 'Conversation Message ID',
            'fwd_messages' => 'Fwd Messages',
            'important' => 'Important',
            'attachments' => 'Attachments',
            'payload' => 'Payload',
            'is_hidden' => 'Is Hidden',
            'group_id' => 'Group ID',
            'response' => 'Response',
            'keyboard' => 'Keyboard',
            'inout' => 'Inout',
        ];
    }

    /**
     * @inheritdoc
     * @return MessageVkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageVkQuery(get_called_class());
    }
}
