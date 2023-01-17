<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_chat".
 *
 * @property int $id Unique user or chat identifier
 * @property string $type Chat type, either private, group, supergroup or channel
 * @property string $title Chat (group) title, is null if chat ENGINE is private
 * @property string $created_at Entry date creation
 * @property string $updated_at Entry date update
 * @property int $old_id Unique chat identifier, this is filled when a group is converted to a supergroup
 *
 * @property BotChatUser[] $botChatUsers
 * @property BotUser[] $users
 * @property BotConversation[] $botConversations
 * @property BotEditedMessage[] $botEditedMessages
 * @property BotMessage[] $botMessages
 * @property BotMessage[] $botMessages0
 */
class BotChat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bot_chat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'required'],
            [['id', 'old_id'], 'integer'],
            [['type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
   'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'old_id' => 'Old ID',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBotChatUsers()
    {
        return $this->hasMany(BotChatUser::className(), ['chat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(BotUser::className(), ['id' => 'user_id'])->viaTable('bot_chat_user', ['chat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBotConversations()
    {
        return $this->hasMany(BotConversation::className(), ['chat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBotEditedMessages()
    {
        return $this->hasMany(BotEditedMessage::className(), ['chat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBotMessages()
    {
        return $this->hasMany(BotMessage::className(), ['chat_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBotMessages0()
    {
        return $this->hasMany(BotMessage::className(), ['forward_from_chat' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return BotChatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotChatQuery(get_called_class());
    }

}
