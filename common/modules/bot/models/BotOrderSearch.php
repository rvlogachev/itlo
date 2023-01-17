<?php

namespace common\modules\bot\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\bot\models\BotOrder;

/**
 * BotOrderSearch represents the model behind the search form about `common\modules\bot\models\BotOrder`.
 */
class BotOrderSearch extends BotOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status','user_id','status_pay'], 'integer'],
            [['type', 'vidhoroscope','anonymous','name', 'promo','email','date_birth', 'time_birth', 'place_birth', 'name_partner', 'date_birth_partner', 'time_birth_partner', 'place_birth_partner', 'created_at', 'updated_at'], 'safe'],
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
        $query = BotOrder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'status_pay' => $this->status_pay,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'date_birth', $this->date_birth])
            ->andFilterWhere(['like', 'time_birth', $this->time_birth])
            ->andFilterWhere(['like', 'place_birth', $this->place_birth])
            ->andFilterWhere(['like', 'name_partner', $this->name_partner])
            ->andFilterWhere(['like', 'date_birth_partner', $this->date_birth_partner])
            ->andFilterWhere(['like', 'time_birth_partner', $this->time_birth_partner])
            ->andFilterWhere(['like', 'place_birth_partner', $this->place_birth_partner])
            ->andFilterWhere(['like', 'promo', $this->promo]);

        return $dataProvider;
    }
}
