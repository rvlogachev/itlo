<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Questions;

/**
 * QuestionsSearch represents the model behind the search form about `common\models\Questions`.
 */
class QuestionsSearch extends Questions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'priority'], 'integer'],
            [['text', 'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'success_answer'], 'safe'],
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
        $query = Questions::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'priority' => $this->priority,
        ]);

        $query->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'answer1', $this->answer1])
            ->andFilterWhere(['like', 'answer2', $this->answer2])
            ->andFilterWhere(['like', 'answer3', $this->answer3])
            ->andFilterWhere(['like', 'answer4', $this->answer4])
            ->andFilterWhere(['like', 'answer5', $this->answer5])
            ->andFilterWhere(['like', 'success_answer', $this->success_answer]);

        return $dataProvider;
    }
}
