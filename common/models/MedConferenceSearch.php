<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MedConference;

/**
 * modelsMedConferenceSearch represents the model behind the search form about `common\models\MedConference`.
 */
class MedConferenceSearch extends MedConference
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'doctor_id', 'user_id', 'status'], 'integer'],
            [['date_conf', 'data_json','date_conf'], 'safe'],
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
        $query = MedConference::find();



	   // if(\Yii::$app->user->can('doctor')  ){
//		    $userCompany = UserCompany::find()->where(['user_id'=> \Yii::$app->user->getId()])->all();
//		    $ar=[];
//		    foreach ($userCompany as $item){
//			    $ar[] = $item->company_id;
//		    }
//		    $query->joinWith("company");
//		    $query->andFilterWhere(['in', 'user_company.company_id', $ar]);
	  //  }





        $dataProvider = new ActiveDataProvider([
            'query' => $query,
	        'sort' => [
		        'defaultOrder' => [
			        'id' => SORT_DESC,

		        ]
	        ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'doctor_id' => $this->doctor_id,
            'user_id' => $this->user_id,
            'date_conf' => $this->date_conf,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'data_json', $this->data_json]);
        $query->andFilterWhere(['like', 'date_conf', $this->date_conf]);

        return $dataProvider;
    }
}
