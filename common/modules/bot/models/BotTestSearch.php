<?php

namespace common\modules\bot\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\bot\models\BotTest;

/**
 * BotTestSearch represents the model behind the search form about `common\modules\bot\models\BotTest`.
 */
class BotTestSearch extends BotTest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'number'], 'integer'],
            [['question', 'answer_yes', 'answer_no', 'answer_middle', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = BotTest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'number' => $this->number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'answer_yes', $this->answer_yes])
            ->andFilterWhere(['like', 'answer_no', $this->answer_no])
            ->andFilterWhere(['like', 'answer_middle', $this->answer_middle])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
