<?php

namespace common\modules\search\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\search\models\Search;

/**
 * SearchIgnoredCommon represents the model behind the search form of `wdmg\search\models\SearchIgnored`.
 */
class SearchIgnoredCommon extends SearchIgnored
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pattern', 'status', 'hash', 'created_at', 'created_by', 'created_at', 'updated_by'], 'safe'],
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
    public function filter($params)
    {
        $query = SearchIgnored::find();

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
        ]);

        $query->andFilterWhere(['like', 'pattern', $this->pattern])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        if($this->status !== "*")
            $query->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

}
