<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MedTerminals;

/**
 * MedTerminalsSearch represents the model behind the search form about `common\models\MedTerminals`.
 */
class MedTerminalsSearch extends MedTerminals
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['adderss', 'fio', 'position', 'phone', 'terminal_id', 'company_id'], 'safe'],
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
        $query = MedTerminals::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'company_id' => $this->company_id,

        ]);

        $query->andFilterWhere(['like', 'adderss', $this->adderss])
            ->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'terminal_id', $this->terminal_id])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
