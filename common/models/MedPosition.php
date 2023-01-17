<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "med_position".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 */
class MedPosition extends \yii\db\ActiveRecord
{

	const STATUS_NOT_ACTIVE = 0;
	const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Должность',
            'status' => 'Статус',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MedPositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedPositionQuery(get_called_class());
    }


	public static function statuses()
	{
		return [
			self::STATUS_NOT_ACTIVE =>'Выключено' ,
			self::STATUS_ACTIVE => 'Активно',

		];
	}

}
