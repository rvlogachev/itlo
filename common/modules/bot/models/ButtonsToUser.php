<?php

namespace common\modules\bot\models;

use Yii;

/**
 * This is the model class for table "buttons_to_user".
 *
 * @property int $id ИД
 * @property int $buttons_id ИД кнопки
 * @property int $user_id ИД пользователя
 * @property int $status Статус
 * @property string $key Ключ
 * @property string $platform
 */
class ButtonsToUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buttons_to_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buttons_id', 'user_id', 'status'], 'integer'],
            [['platform'], 'string'],
            [['key'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД',
            'buttons_id' => 'ИД кнопки',
            'user_id' => 'ИД пользователя',
            'status' => 'Статус',
            'key' => 'Ключ',
            'platform' => 'Platform',
        ];
    }

    /**
     * @inheritdoc
     * @return ButtonsToUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ButtonsToUserQuery(get_called_class());
    }
}
