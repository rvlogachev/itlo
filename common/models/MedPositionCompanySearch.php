<?php

namespace common\models;

use common\models\MedPositionCompany;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * MedPositionCompanySearch represents the model behind the search form about `common\models\MedPositionCompany`.
 */
class MedPositionCompanySearch extends MedPositionCompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'status'], 'integer'],
            [['name', 'company_id',  'status'], 'safe'],
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
//	    $model = User::find()->where(['id'=>\Yii::$app->user->getId()])->one();
//        $query = MedPositionCompany::find()->where(['company_id' => $model->company_id]);

	    $query = MedPositionCompany::find();

	    if(Yii::$app->user->can('manager HR')){
		    $keyStorage = Yii::$app->keyStorage;

		    $companu_id = $keyStorage->get('currentCompanyUser_'.Yii::$app->user->getId());
		    $query->where(['company_id' => $companu_id]);

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
        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}
