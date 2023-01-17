<?php

namespace common\models;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Exception;

/**
 * This is the model class for table "user_profile".
 *
 * @property integer $user_id
 * @property integer $locale
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $picture
 * @property string $avatar
 * @property string $avatar_path
 * @property string $position
 * @property string $avatar_base_url
 * @property integer $gender
 *
 * @property User $user
 */
class UserProfile extends ActiveRecord
{
	const GENDER_MALE = 1;
	const GENDER_FEMALE = 2;


	const HR = 'Руководитель (HR)';
	const HR_ID = 3;
	const DOCTOR = 'Доктор';
	const DOCTOR_ID = 2;

	/**
	 * @var
	 */
	public $picture;

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%user_profile}}';
	}

	/**
	 * @return array
	 */
	public function behaviors()
	{
		return [
			'picture' => [
				'class' => UploadBehavior::class,
				'attribute' => 'picture',
				'pathAttribute' => 'avatar_path',
				'baseUrlAttribute' => 'avatar_base_url'
			]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['phone'], 'unique'],
			[['user_id', 'firstname', 'middlename', 'lastname', 'number', 'phone', 'date_birth'], 'required'],
			[['user_id', 'gender'], 'integer'],
			[['gender'], 'in', 'range' => [NULL, self::GENDER_FEMALE, self::GENDER_MALE]],
			[['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url'], 'string', 'max' => 255],
			['locale', 'default', 'value' => Yii::$app->language],
			['locale', 'in', 'range' => array_keys(Yii::$app->params['availableLocales'])],
			['picture', 'safe'],
			['imt', 'safe'],
			['phone', 'safe'],
			[['locale', 'growth', 'weight', 'is_disease'], 'required'],
			[['gender', 'work_pressure_min', 'work_pressure_max', 'down_pressure_max', 'down_pressure_min', 'pulse_min', 'pulse_max', 'is_disease'], 'integer'],
			[['date_birth', 'number', 'position'], 'safe'],
			[['growth', 'weight', 'number'], 'number'],

			[['work_pressure_min', 'work_pressure_max'], 'workPressure'],
			[['down_pressure_min', 'down_pressure_max'], 'downPressure'],
			[['pulse_min', 'pulse_max'], 'pulse'],

		];
	}


	public function workPressure($attribute, $params)
	{
		if (empty($this->work_pressure_min) || empty($this->work_pressure_max)) {
			$this->addError($attribute, 'Необходимо заполнить оба параметра из группы');
		}

	}

	public function downPressure($attribute, $params)
	{

		if (empty($this->down_pressure_min) || empty($this->down_pressure_max)) {
			$this->addError($attribute, 'Необходимо заполнить оба параметра');
		}

	}

	public function pulse($attribute, $params)
	{

		if (empty($this->pulse_min) || empty($this->pulse_max)) {
			$this->addError($attribute, 'Необходимо заполнить оба параметра');
		}
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'user_id' => Yii::t('common', 'User ID'),
			'firstname' => Yii::t('common', 'Имя'),
			'middlename' => Yii::t('common', 'Отчество'),
			'lastname' => Yii::t('common', 'Фамилия'),
			'locale' => Yii::t('common', 'Язык'),
			'picture' => Yii::t('common', 'Фото'),
			'gender' => Yii::t('common', 'Пол'),
			'phone' => Yii::t('common', 'Телефон'),
			'growth' => Yii::t('common', 'Рост'),
			'weight' => Yii::t('common', 'Вес'),
			'work_pressure' => Yii::t('common', 'Рабочее давление'),
			'is_disease' => Yii::t('common', 'Имеются ли у Вас заболевание'),
			'imt' => Yii::t('common', 'Индекс массы тела'),

			'work_pressure_min' => Yii::t('common', 'Минимальный порог верхнего давления'),
			'work_pressure_max' => Yii::t('common', 'Максимальный порог верхнего давления'),
			'down_pressure_min' => Yii::t('common', 'Минимальный порог нижнего давления'),
			'down_pressure_max' => Yii::t('common', 'Максимальный порог нижнего давления'),
			'pulse_min' => Yii::t('common', 'Минимальный порог пульса'),
			'pulse_max' => Yii::t('common', 'Максимальный порог пульса'),
			'date_birth' => Yii::t('common', 'Дата рождения'),
			'number' => Yii::t('common', 'Табельный номер'),


		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser()
	{
		return $this->hasOne(User::class, ['id' => 'user_id']);
	}


	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCompany()
	{
		return $this->hasOne(UserCompany::class, ['user_id' => 'user_id']);
	}


	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @return null|string
	 */
	public function getFullName()
	{
		if ($this->firstname || $this->lastname) {
			return implode(' ', [$this->lastname, $this->firstname, $this->middlename]);
		}
		return null;
	}

	public function getName()
	{
		if ($this->firstname || $this->lastname) {
			return implode(' ', [$this->firstname, $this->lastname]);
		}
		return null;
	}


	/**
	 * @param null $default
	 * @return bool|null|string
	 */
	public function getAvatar($default = null)
	{
		return $this->avatar_path
			? Yii::getAlias($this->avatar_base_url . '/' . $this->avatar_path)
			: $default;
	}

	public function afterSave($insert, $changedAttributes)
	{
		try {
			if ($this->imt == null && $this->weight) {
				$this->imt = round($this->growth / $this->weight, 3);
				if (!$this->update()) {
					print_r($this->getErrors());
					die;
				}
			}
		} catch (Exception $e) {
			print_r($e->getMessage());
		}


	}

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {


			if ($this->getUser()->one()->type_id == 3) {
				$this->position = self::HR_ID;
			}
			if ($this->getUser()->one()->type_id == 2) {
				$this->position = self::DOCTOR_ID;
			}

			$this->phone = preg_replace("/[^0-9]/", '', $this->phone);
			return true;
		}
		return false;
	}


	public function getCompanyName($default = null)
	{

		return MedCompany::find()->where(['id' => $this->getUser()->one()->company_id])->one()->name;
	}

	public function getCurrentCompanyName()
	{

		$keyStorage = Yii::$app->keyStorage;
		$company_id = null;
		if ($keyStorage->has('currentCompanyUser_' . Yii::$app->user->getId())) {
			$company_id = $keyStorage->get('currentCompanyUser_' . Yii::$app->user->getId());
			$model = MedCompany::find()->where(['id' => $company_id])->one();
			if ($model) {
				return $model->name;
			}

		} else {

			$user = User::findOne(Yii::$app->user->getId());
			$modelUserCompany = UserCompany::find()->where(['user_id' => Yii::$app->user->getId()])->one();
			if($modelUserCompany){
				$model = MedCompany::find()->where(['id' =>$modelUserCompany->company_id])->one();
				if ($model) {
					return $model->name ;
				}
			}

		}
		return false;
	}

	public function getParam($id, $default = [])
	{
		if (\Yii::$app->user->can('manager HR') && Yii::$app->user->getId() == $id) {
			return  array_merge($default, ['disabled' => 'disabled']);
		}

		return $default;
	}

	public function getPositionByRole($id, $role)
	{

		if(Yii::$app->user->can('administrator')){
			$modelPositionCompany = \common\models\MedPosition::find()->all();

			return  \yii\helpers\ArrayHelper::map($modelPositionCompany, 'id', 'name');

		}else{
			$keyStorage = Yii::$app->keyStorage;
			$company_id = $keyStorage->get('currentCompanyUser_' . Yii::$app->user->getId());
			if (Yii::$app->user->getId() == $id && \Yii::$app->user->can($role)){
				return ['value'=>UserProfile::HR];
			}else{
				$modelPositionCompany = \common\models\MedPositionCompany::find()->where(['company_id'=>$company_id])->all();
				return  \yii\helpers\ArrayHelper::map($modelPositionCompany, 'id', 'name');
			}
		}





	}
}
