<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_log".
 *
 * @property integer $id
 * @property integer $update_id
 * @property integer $is_callback
 * @property integer $callback_query_id
 * @property integer $callback_query_from_id
 * @property string $callback_query_from_is_bot
 * @property string $callback_query_from_first_name
 * @property string $callback_query_from_username
 * @property string $callback_query_from_language_code
 * @property integer $callback_chat_instance
 * @property string $callback_data
 * @property integer $message_id
 * @property integer $from_id
 * @property integer $from_is_bot
 * @property string $from_first_name
 * @property string $from_username
 * @property string $from_language_code
 * @property integer $chat_id
 * @property string $chat_first_name
 * @property string $chat_username
 * @property string $chat_type
 * @property string $date
 * @property string $text
 * @property string $entities
 */
class BotLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bot_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['update_id', 'is_callback', 'callback_query_id', 'callback_chat_instance', 'message_id', 'from_id', 'from_is_bot', 'chat_id'], 'integer'],
            [['text', 'entities'], 'string'],
            [['callback_query_from_is_bot', 'callback_query_from_first_name', 'callback_query_from_username', 'callback_query_from_language_code', 'callback_data', 'from_first_name', 'from_username', 'from_language_code', 'chat_first_name', 'chat_username', 'chat_type', 'date', 'callback_query_from_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'update_id' => 'Update ID',
            'is_callback' => 'Is Callback',
            'callback_query_id' => 'Callback Query ID',
            'callback_query_from_id' => 'Callback Query From ID',
            'callback_query_from_is_bot' => 'Callback Query From Is Bot',
            'callback_query_from_first_name' => 'Callback Query From First Name',
            'callback_query_from_username' => 'Callback Query From Username',
            'callback_query_from_language_code' => 'Callback Query From Language Code',
            'callback_chat_instance' => 'Callback Chat Instance',
            'callback_data' => 'Callback Data',
            'message_id' => 'Message ID',
            'from_id' => 'From ID',
            'from_is_bot' => 'From Is Bot',
            'from_first_name' => 'From First Name',
            'from_username' => 'From Username',
            'from_language_code' => 'From Language Code',
            'chat_id' => 'Chat ID',
            'chat_first_name' => 'Chat First Name',
            'chat_username' => 'Chat Username',
            'chat_type' => 'Chat Type',
            'date' => 'Date',
            'text' => 'Text',
            'entities' => 'Entities',
        ];
    }

    /**
     * @inheritdoc
     * @return BotLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotLogQuery(get_called_class());
    }
}
