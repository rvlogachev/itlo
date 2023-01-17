<?php

namespace common\modules\pages\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\pages\models\Pages;

/**
 * PagesSearch represents the model behind the search form of `wdmg\pages\models\Pages`.
 */
class PagesSearch extends Pages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'in_sitemap', 'in_turbo', 'in_amp'], 'integer'],
            [['name', 'alias', 'title', 'description', 'keywords', 'status', 'locale'], 'safe'],
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
        $query = Pages::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        } else {
            // query all without languages version
            $query->where([
                'source_id' => null,
            ]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id
        ]);

        $query->andFilterWhere([
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'keywords', $this->keywords]);

        if ($this->in_sitemap !== "*")
            $query->andFilterWhere(['like', 'in_sitemap', $this->in_sitemap]);

        if ($this->in_turbo !== "*")
            $query->andFilterWhere(['like', 'in_turbo', $this->in_turbo]);

        if ($this->in_amp !== "*")
            $query->andFilterWhere(['like', 'in_amp', $this->in_amp]);

        if ($this->locale !== "*") {
            if ($this->locale) {
                $query->andFilterWhere(['like', 'locale', $this->locale]);
            } else {
                $query->andFilterWhere(['locale' => null]);
            }
        }

        if ($this->status !== "*")
            $query->andFilterWhere(['like', 'status', $this->status]);

        $query->orderBy('COALESCE(`parent_id`, `id`), `parent_id` IS NOT NULL, `id`');

        return $dataProvider;
    }

}
