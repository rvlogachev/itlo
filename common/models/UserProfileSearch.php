<?php


namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserProfile;

/**
 * UserProfileSearch represents the model behind the search form about `common\models\UserProfile`.
 */
class UserProfileSearch extends UserProfile
{

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['user_id',   'gender', 'number', 'growth', 'weight', 'work_pressure_min', 'work_pressure_max', 'down_pressure_min', 'down_pressure_max', 'pulse_min', 'pulse_max', 'is_disease'], 'integer'],
			[['firstname', 'middlename', 'lastname', 'avatar_path', 'avatar_base_url', 'locale', 'phone', 'position', 'date_birth',  'number', 'gender', 'imt'], 'safe'],
			[['imt'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$query = UserProfile::find();

		if(\Yii::$app->user->can('manager HR')  ){
			$userCompany = UserCompany::find()->where(['user_id'=> \Yii::$app->user->getId()])->all();
			$ar=[];
			foreach ($userCompany as $item){
				$ar[] = $item->company_id;
			}
			$query->joinWith("company");
			$query->andFilterWhere(['in', 'user_company.company_id', $ar]);
			$query->andFilterWhere(['!=', 'user_profile.user_id', Yii::$app->user->getId()]);
		}

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		if (!($this->load($params) && $this->validate())) {
			return $dataProvider;
		}




		$query->andFilterWhere([
			'user_id' => $this->user_id,
			'gender' => $this->gender,
			'date_birth' => $this->date_birth,

			'growth' => $this->growth,
			'weight' => $this->weight,
			'imt' => $this->imt,


			'work_pressure_min' => $this->work_pressure_min,
			'work_pressure_max' => $this->work_pressure_max,
			'down_pressure_min' => $this->down_pressure_min,
			'down_pressure_max' => $this->down_pressure_max,
			'pulse_min' => $this->pulse_min,
			'pulse_max' => $this->pulse_max,
			'is_disease' => $this->is_disease,
		]);

		$query->andFilterWhere(['like', 'firstname', $this->firstname])
			->andFilterWhere(['like', 'middlename', $this->middlename])
			->andFilterWhere(['like', 'lastname', $this->lastname])
			->andFilterWhere(['like', 'avatar_path', $this->avatar_path])
			->andFilterWhere(['like', 'avatar_base_url', $this->avatar_base_url])
			->andFilterWhere(['like', 'locale', $this->locale])

			->andFilterWhere(['like', 'number', $this->number])
			->andFilterWhere(['like', 'position', $this->position]);

		return $dataProvider;
	}
}
