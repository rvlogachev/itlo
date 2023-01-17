<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "{{%conversation}}".
 *
 * @property string $id ИД диалога
 * @property int $user_id ИД пользователя
 * @property int $chat_id ИД чата
 * @property string $status Статус диалога
 * @property string $command Дефолтная команда
 * @property string $notes Параметры диалога
 * @property string $created_at Дата создания
 * @property string $updated_at Дата обновления
 */
class Conversation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bot_conversation}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'chat_id'], 'string'],
            [['status'], 'string'],
            [['created_at', 'updated_at','notes'], 'safe'],
            [['command'], 'string', 'max' => 160],
            [['notes'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ИД диалога'),
            'user_id' => Yii::t('backend', 'ИД пользователя'),
            'chat_id' => Yii::t('backend', 'ИД чата'),
            'status' => Yii::t('backend', 'Статус диалога'),
            'command' => Yii::t('backend', 'Дефолтная команда'),
            'notes' => Yii::t('backend', 'Параметры диалога'),
            'created_at' => Yii::t('backend', 'Дата создания'),
            'updated_at' => Yii::t('backend', 'Дата обновления'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ConversationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConversationQuery(get_called_class());
    }
}
