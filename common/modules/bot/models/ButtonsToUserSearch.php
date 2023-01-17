<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ButtonsToUser;

/**
 * ButtonsToUserSearch represents the model behind the search form about `common\models\ButtonsToUser`.
 */
class ButtonsToUserSearch extends ButtonsToUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'buttons_id', 'user_id', 'status'], 'integer'],
            [[ 'platform'], 'safe'],
            [['key'], 'safe'],
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
        $query = ButtonsToUser::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'buttons_id' => $this->buttons_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'key', $this->key]);

        return $dataProvider;
    }
}
