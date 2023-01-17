<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "med_settings".
 *
 * @property int $id
 * @property int $printer_count
 * @property float $reference_temp_ot
 * @property float $reference_temp_do
 * @property float $reference_bpp_up_ot
 * @property float $reference_bpp_up_do
 * @property float $reference_bpp_lower_ot
 * @property float $reference_bpp_lower_do
 * @property float $reference_bpp_pulse_ot
 * @property float $reference_bpp_pulse_do
 * @property float $reference_alco_ot
 * @property float $reference_alco_do
 * @property string $all_phone
 */
class MedSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'med_settings';
    }

    /**
     * {@inheritdoc}
     */
	public function rules()
	{
		return [
			[['reference_temp_ot'], 'required'],
			[['reference_temp_ot', 'user_id', 'rate', 'printer_count'], 'integer'],
			[['reference_temp_do', 'reference_bpp_up_ot', 'reference_bpp_up_do', 'reference_bpp_lower_ot'], 'string', 'max' => 250],
			[['reference_bpp_lower_do', 'reference_bpp_pulse_ot', 'reference_bpp_pulse_do', 'reference_alco_ot', 'reference_alco_do'], 'string', 'max' => 255],
			[['all_phone'], 'string', 'max' => 50],
		];
	}

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reference_temp_ot' => 'Температура min',
            'reference_temp_do' => 'Температура max',
            'reference_bpp_up_ot' => 'Давление верхнее min',
            'reference_bpp_up_do' => 'Давление верхнее max',
            'reference_bpp_lower_ot' => 'Давление нижнее min',
            'reference_bpp_lower_do' => 'Давление нижнее max',
            'reference_bpp_pulse_ot' => 'Пульс min',
            'reference_bpp_pulse_do' => 'Пульс max',
            'reference_alco_ot' => 'Алкоголь min',
            'reference_alco_do' => 'Алкоголь max',
            'rate' => 'Стоимость осмотра',
            'all_phone' => 'Телефон технической поддержки',
            'printer_count' => 'Настрока ленты',
        ];
    }

    /**
     * {@inheritdoc}
     * @return MedSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MedSettingsQuery(get_called_class());
    }
}
