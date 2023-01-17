<?php

namespace common\modules\bot\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\bot\models\UserBot;

/**
 * UserBotSearch represents the model behind the search form of `common\modules\bot\models\UserBot`.
 */
class UserBotSearch extends UserBot
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',   'phone', 'bonus','status'], 'integer'],
            [['first_name', 'lang','last_name', 'username', 'created_at', 'updated_at', 'platform','cookie','role','status'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = UserBot::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'email' => $this->email,
            'phone' => $this->phone,
            'bonus' => $this->bonus,
            'cookie' => $this->cookie,
            'role' => $this->role,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'platform', $this->platform])
            ->andFilterWhere(['like', 'lang', $this->lang]);

        return $dataProvider;
    }
}
