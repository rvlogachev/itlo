<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "balance_history".
 *
 * @property int $id
 * @property int $company_id
 * @property int $terminal_id
 * @property string|null $date_report
 * @property string|null $reason
 * @property string|null $type
 * @property int|null $old
 * @property int|null $new
 * @property int|null $value

 */
class BalanceHistory extends \yii\db\ActiveRecord
{


	const TYPE_INC = 1;
	const TYPE_DEC = 0;
	const DEFAULT = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'balance_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id' ], 'required'],
            [['company_id', 'terminal_id', 'old', 'new', 'value'], 'integer'],
            [[ 'type' ], 'integer'],
            [['date_report', 'type', 'reason', 'value'], 'safe'],
	        [[ 'old', 'new', 'value'], 'default', 'value' => self::DEFAULT],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Компания',
            'terminal_id' => 'Терминал',
            'date_report' => 'Дата',
            'old' => 'До операции',
            'new' => 'После операции',
            'type' => 'Тип операции',
            'value' => 'Сумма',
            'reason' => 'Основание',
        ];
    }

    /**
     * {@inheritdoc}
     * @return BalanceHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BalanceHistoryQuery(get_called_class());
    }

	public static function types()
	{
		return [
			self::TYPE_DEC =>  'Списание',
			self::TYPE_INC =>  'Пополнение',

		];
	}
	public static function typesText()
	{
		return [
			self::TYPE_DEC => "<span class='badge badge-pill badge-danger'>Списание</span>",
			self::TYPE_INC =>  "<span class='badge badge-pill badge-success'>Пополнение</span>",

		];
	}



}
