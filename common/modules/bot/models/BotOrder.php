<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "bot_order".
 *
 * @property int $id
 * @property int $user_id
 * @property string $type Тип гороскопа
 * @property string $name Имя
 * @property string $date_birth Дата рождения
 * @property string $time_birth Время рождения
 * @property string $place_birth Место рождения
 * @property string $name_partner Имя партнера
 * @property string $date_birth_partner Дата рождения партнера
 * @property string $time_birth_partner Время рождения партнера
 * @property string $place_birth_partner Место рождения партнера
 * @property string $email Почта
 * @property int $status Статус
 * @property int $status_pay Статус оплаты
 * @property string $created_at Дата создания
 * @property string $promo
 * @property string $updated_at Дата обновления
 * @property string $vidhoroscope
 * @property string $anonymous
 */
class BotOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bot_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status','user_id','status_pay'], 'integer'],
            [['created_at','promo','vidhoroscope','anonymous', 'updated_at'], 'safe'],
            [['type', 'name', 'promo', 'email','date_birth', 'time_birth', 'place_birth', 'name_partner', 'date_birth_partner', 'time_birth_partner', 'place_birth_partner'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип гороскопа',
            'name' => 'Имя',
            'email' => 'Email',
            'date_birth' => 'Дата рождения',
            'time_birth' => 'Время рождения',
            'place_birth' => 'Место рождения',
            'name_partner' => 'Имя партнера',
            'date_birth_partner' => 'Дата рождения партнера',
            'time_birth_partner' => 'Время рождения партнера',
            'place_birth_partner' => 'Место рождения партнера',
            'status' => 'Статус',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'status_pay' => 'Статус оплаты',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BotOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BotOrderQuery(get_called_class());
    }
}
