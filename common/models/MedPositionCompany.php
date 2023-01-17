<?php



namespace common\models;

use Yii;
/**
 * This is the model class for table "med_position_company".
 *
 * @property int $id
 * @property string $name
 * @property int $company_id
 * @property int $status
 */
class MedPositionCompany extends \yii\db\ActiveRecord
{

	const STATUS_NOT_ACTIVE = 0;
	const STATUS_ACTIVE = 1;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'med_position_company';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name', 'company_id'], 'required'],
			[['company_id', 'status'], 'integer'],
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
			'company_id' => 'Компания',
			'status' => 'Статус',
		];
	}

	/**
	 * {@inheritdoc}
	 * @return MedPositionCompanyQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new MedPositionCompanyQuery(get_called_class());
	}

	public static function getCount()
	{
		$query = MedPositionCompany::find();
		if(Yii::$app->user->can('manager HR')){
			$keyStorage = Yii::$app->keyStorage;
			$companu_id = $keyStorage->get('currentCompanyUser_'.Yii::$app->user->getId());
			$query->where(['company_id' => $companu_id]);
		}
		return $query->count();
	}


	public static function statusesText()
	{
		return [
			self::STATUS_ACTIVE => '<span class=\'badge badge-pill badge-success\'>Активно</span>',
			self::STATUS_NOT_ACTIVE => '<span class=\'badge badge-pill badge-danger\'>Заблокировано</span>',
		];
	}

	public static function statuses()
	{
		return [
			self::STATUS_ACTIVE => \Yii::t('common', 'Активно'),
			self::STATUS_NOT_ACTIVE => \Yii::t('common', 'Заблокировано'),
		];
	}

}
