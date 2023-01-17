<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_user".
 *
 * @property int $id Unique user identifier
 * @property int $role
 * @property string $first_name User's first name
 * @property string $last_name User's last name
 * @property string $username User's username
 * @property string $created_at Entry date creation
 * @property string $updated_at Entry date update
 * @property int $email
 * @property int $phone
 * @property int $bonus
 * @property string $platform
 * @property string $cookie
 * @property string $status
 * @property string $lang

 */
class UserBot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bot_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [[ 'phone', 'bonus','status'], 'integer'],
            [['created_at', 'updated_at','platform','status'], 'safe'],
            [['cookie'], 'string'],
            [['first_name', 'lang','last_name', 'username','role'], 'string', 'max' => 255],
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
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'username' => 'Имя пользователя',
            'status' => 'Статус',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'email' => 'Email',
            'role' => 'Роль',

            'phone' => 'Телефон',
        //    'bonus' => 'Бонусы',
            'platform' => 'Платформа',
        ];
    }


}
