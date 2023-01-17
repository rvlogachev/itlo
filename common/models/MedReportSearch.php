<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MedReport;

/**
 * MedReportSearch represents the model behind the search form about `common\models\MedReport`.
 */
class MedReportSearch extends MedReport
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'doctor_id', 'conference_id', 'company_id'], 'integer'],
            [['date_report', 'data_report', 'status', 'company_id'], 'safe'],
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
        $query = MedReport::find();//->andWhere(['not', ['user_id' => null]]);

	    if(\Yii::$app->user->can(User::ROLE_DOCTOR)  ){
	    	$doctor = MedDoctors::find()->where(['user_id'=> Yii::$app->user->getId()])->one();
	    	if($doctor){
			    $query->andFilterWhere([ 'doctor_id'=> $doctor->id]);
		    }
	    }

	    if(\Yii::$app->user->can(User::ROLE_MANAGER_HR)  ){
		    $keyStorage = Yii::$app->keyStorage;
			$company_id = $keyStorage->get('currentCompanyUser_' . Yii::$app->user->getId());
		    $query->andFilterWhere([ 'company_id'=> $company_id]);
	    }


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

        if(!empty($this->date_report)){
        	$dates = explode(" ", $this->date_report);
	        $query->andFilterWhere([
		       // 'date(date_report)' => date("Y-m-d", strtotime($this->date_report))
		       'between', 'date(date_report)', date("Y-m-d", strtotime(trim($dates[0]))), date("Y-m-d", strtotime(trim($dates[2])))
	        ]);
        }


        $query->andFilterWhere([
            'id' => $this->id,

            'user_id' => $this->user_id,
            'doctor_id' => $this->doctor_id,
            'company_id' => $this->company_id,
            'conference_id' => $this->conference_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'data_report', $this->data_report]);

        return $dataProvider;
    }
}
