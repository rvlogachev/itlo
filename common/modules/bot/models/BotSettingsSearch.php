<?php

namespace common\modules\bot\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\bot\models\BotSettings;

/**
 * BotSettingsSearch represents the model behind the search form about `common\modules\bot\models\BotSettings`.
 */
class BotSettingsSearch extends BotSettings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'group_id'], 'integer'],
            [['reqest','key'], 'safe'],
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
        $query = BotSettings::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'group_id' => $this->group_id,

        ]);

        $query->andFilterWhere(['like', 'key', $this->key]);
        $query->andFilterWhere(['like', 'reqest', $this->reqest]);

        return $dataProvider;
    }
}
