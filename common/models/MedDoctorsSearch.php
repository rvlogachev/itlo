<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MedDoctors;

/**
 * modelsMedDoctorsSearch represents the model behind the search form about `common\models\MedDoctors`.
 */
class MedDoctorsSearch extends MedDoctors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['signature_hash', 'fio','phone','email', 'company_id'], 'safe'],
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



    	$query = MedDoctors::find();
//	    if(\Yii::$app->user->can('manager HR') || \Yii::$app->user->can('doctor')){
//
//		    $keyStorage = Yii::$app->keyStorage;
//		    $company_id = $keyStorage->get('currentCompanyUser_' . Yii::$app->user->getId());
//
//
//
//		    $query->joinWith("user");
//		    $query->andFilterWhere([ 'user.company_id' => $company_id]);
//	    }


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }





        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'signature_hash', $this->signature_hash])
	        ->andFilterWhere(['like', 'fio', $this->fio])
	        ->andFilterWhere(['like', 'phone', $this->phone])
	        ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
