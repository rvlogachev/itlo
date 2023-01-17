<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MedCompany;

/**
 * MedCompanySearch represents the model behind the search form about `common\models\MedCompany`.
 */
class MedCompanySearch extends MedCompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'forma', 'address', 'balance', 'limit', 'rate', 'status', 'phone'], 'safe'],
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
        $query = MedCompany::find();


	     if(\Yii::$app->user->can('manager HR') || \Yii::$app->user->can('doctor')){


		    $userCompany = \common\models\UserCompany::find()->andFilterWhere([  'user_id'=> Yii::$app->user->getId()])->all();
		    $companyAr = [];
			foreach ($userCompany as $item){
				$companyAr[]=$item->company_id;
			}

		    $query->andFilterWhere([
			   'in', 'id' , $companyAr,
		    ]);


	   }



        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,


            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'forma', $this->forma])
            ->andFilterWhere(['like', 'balance', $this->balance])
            ->andFilterWhere(['like', 'limit', $this->limit])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'rate', $this->rate]);

        return $dataProvider;
    }
}
