<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "med_terminals".
 *
 * @property int $id
 * @property int $terminal_id
 * @property string|null $adderss
 * @property string|null $fio
 * @property string|null $position
 * @property string|null $phone
 */
class MedTerminals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_terminals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['terminal_id'], 'required'],
            [['terminal_id'], 'string'],
            [['adderss'], 'string'],
            [['company_id'], 'integer'],
            [['fio'], 'string', 'max' => 500],
            [['position', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'terminal_id' => 'Терминал id',
            'adderss' => 'Адрес',
            'fio' => 'Фио ответственного',
            'position' => 'Должность',
            'phone' => 'Телефон',
            'company_id' => 'Компания',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MedTerminalsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedTerminalsQuery(get_called_class());
    }
}
