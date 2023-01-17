<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'type_id'], 'integer'],
            [['created_at', 'updated_at', 'logged_at'], 'default', 'value' => null],
            [['username', 'auth_key', 'password_hash', 'email','type_id', 'uid', 'type_id', 'company_id'], 'safe'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {


	    if(\Yii::$app->user->can('manager HR') || \Yii::$app->user->can('doctor')){

		    $keyStorage = Yii::$app->keyStorage;
		    $company_id = $keyStorage->get('currentCompanyUser_' . Yii::$app->user->getId());

		    $query = User::find()->where([
			   'in', 'company_id', $company_id,
		    ]);




	    }else{
		    $query = User::find();
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

            'type_id' => $this->type_id,

        ]);





        if ($this->created_at !== null) {
            $query->andFilterWhere(['between', 'created_at', strtotime($this->created_at), strtotime($this->created_at) + 3600 * 24]);
        }

        if ($this->updated_at !== null) {
            $query->andFilterWhere(['between', 'updated_at', strtotime($this->updated_at), strtotime($this->updated_at) + 3600 * 24]);
        }

        if ($this->logged_at !== null) {
            $query->andFilterWhere(['between', 'logged_at', strtotime($this->logged_at), strtotime($this->logged_at) + 3600 * 24]);
        }

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
