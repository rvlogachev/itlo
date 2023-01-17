<?php

namespace common\models;

use yii\db\Exception;

/**
 * This is the model class for table "med_company".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $forma
 * @property string|null $address
 * @property string|null $balance
 * @property string|null $limit
 */
class MedCompany extends \yii\db\ActiveRecord
{
	const STATUS_NOT_ACTIVE = 0;
	const STATUS_ACTIVE = 1;

	const DEFAULT = 0;

	const MAX_LIMIT = 1000000;

	public $reason;
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'med_company';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [

			[[ 'name', 'forma', 'address', 'phone' ], 'required'],
			[['name', 'forma', 'address'], 'string', 'max' => 500],
			[ ['limit'], 'number', 'min' => 0, 'max' => self::MAX_LIMIT],
			[['balance', 'limit', 'rate', 'status'], 'integer'],
			[['phone' ], 'string'],
			[['limit', 'rate'], 'default', 'value' => self::DEFAULT],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'name' => 'Название',
			'forma' => 'Форма',
			'address' => 'Адрес',
			'balance' => 'Баланс',
			'limit' => 'Лимит задолженности',
			'rate' => 'Стоимость осмотра',
			'phone' => 'Телефон для связи',
			'status' => 'Статус компапнии',
		];
	}

	public function setPosition()
	{
		 $position_all = MedPosition::find()->all();
		 foreach ($position_all as $item){
		 	$model = new MedPositionCompany();
		 	$model->name = $item->name;
		 	$model->company_id = $this->id;
		 	if(!$model->save()){
			    throw new Exception( 'Ошибка добавления в базу данных');
		    }
		 }
	}
	/**
	 * {@inheritdoc}
	 * @return MedCompanyQuery the active query used by this AR class.
	 */
	public static function find()
	{
		return new MedCompanyQuery(get_called_class());
	}


	public function getUser()
	{
		return $this->hasOne(User::class, ['company_id' => 'id']);
	}

	public static function AddHistory($value, $reason, $old, $new, $company_id, $type)
	{

		$model = new BalanceHistory();
		$model->value = $value;
		$model->reason = $reason;
		$model->old = $old;
		$model->new = $new;
		$model->type = $type;

		$model->company_id = $company_id;
		if (!$model->save()) {
			return print_r($model->getErrors());

		}
		return $model;

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


	/**
	 * @return int|string
	 */
	public static function getCount()
	{

		if(\Yii::$app->user->can('manager HR') ) {
			$query = MedCompany::find();
			$userCompany = \common\models\UserCompany::find()->andFilterWhere([  'user_id'=> \Yii::$app->user->getId()])->all();
			$companyAr = [];
			foreach ($userCompany as $item){
				$companyAr[]=$item->company_id;
			}

			$query->andFilterWhere([
				'in', 'id' , $companyAr,
			]);

			return $query->count();
		}else{
			return MedCompany::find()->count();
		}
	}

	public static function getCompanyName($ar)
	{

		$company =  \common\models\MedCompany::find()->filterWhere(['in', 'id', $ar])->all();
		$out=[];


		foreach ($company as $item){


			 	 $out[] = $item->name;
		}
		return implode(", ", $out);
	}
}
