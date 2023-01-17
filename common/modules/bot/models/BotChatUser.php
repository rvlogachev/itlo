<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_chat_user".
 *
 * @property int $chat_id Unique user identifier
 * @property int $user_id Unique user identifier
 *
 * @property BotChat $chat
 * @property UserBot $user
 */
class BotChatUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bot_chat_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chat_id', 'user_id'], 'required'],
            [['chat_id', 'user_id'], 'integer'],
            [['chat_id', 'user_id'], 'unique', 'targetAttribute' => ['chat_id', 'user_id']],
            [['chat_id'], 'exist', 'skipOnError' => true, 'targetClass' => BotChat::className(), 'targetAttribute' => ['chat_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserBot::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'chat_id' => 'Chat ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChat()
    {
        return $this->hasOne(BotChat::className(), ['id' => 'chat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserBot::className(), ['id' => 'user_id']);
    }
}
