<?php

namespace common\modules\bot\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\bot\models\Settings;

/**
 * SettingsSearch represents the model behind the search form about `common\models\Settings`.
 */
class SettingsSearch extends Settings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','group_id' ], 'integer'],
            [[ 'key','reqest','response'], 'string'],
            [[ 'key','reqest','response'], 'safe'],

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
        $query = Settings::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'key' => $this->key,
            'reqest' => $this->reqest,
            'response' => $this->response,
            'group_id' => $this->group_id
        ]);

        return $dataProvider;
    }
}
