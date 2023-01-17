<?php

namespace common\modules\bot\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\bot\models\BotLog;

/**
 * BotLogSearch represents the model behind the search form about `common\modules\bot\models\BotLog`.
 */
class BotLogSearch extends BotLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'update_id', 'is_callback', 'callback_query_from_id', 'callback_chat_instance', 'message_id', 'from_id', 'from_is_bot', 'chat_id'], 'integer'],
            [['callback_query_id', 'callback_query_from_is_bot', 'callback_query_from_first_name', 'callback_query_from_username', 'callback_query_from_language_code', 'callback_data', 'from_first_name', 'from_username', 'from_language_code', 'chat_first_name', 'chat_username', 'chat_type', 'date', 'text', 'entities'], 'safe'],
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
        $query = BotLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'update_id' => $this->update_id,
            'is_callback' => $this->is_callback,
            'callback_query_from_id' => $this->callback_query_from_id,
            'callback_chat_instance' => $this->callback_chat_instance,
            'message_id' => $this->message_id,
            'from_id' => $this->from_id,
            'from_is_bot' => $this->from_is_bot,
            'chat_id' => $this->chat_id,
        ]);

        $query->andFilterWhere(['like', 'callback_query_id', $this->callback_query_id])
            ->andFilterWhere(['like', 'callback_query_from_is_bot', $this->callback_query_from_is_bot])
            ->andFilterWhere(['like', 'callback_query_from_first_name', $this->callback_query_from_first_name])
            ->andFilterWhere(['like', 'callback_query_from_username', $this->callback_query_from_username])
            ->andFilterWhere(['like', 'callback_query_from_language_code', $this->callback_query_from_language_code])
            ->andFilterWhere(['like', 'callback_data', $this->callback_data])
            ->andFilterWhere(['like', 'from_first_name', $this->from_first_name])
            ->andFilterWhere(['like', 'from_username', $this->from_username])
            ->andFilterWhere(['like', 'from_language_code', $this->from_language_code])
            ->andFilterWhere(['like', 'chat_first_name', $this->chat_first_name])
            ->andFilterWhere(['like', 'chat_username', $this->chat_username])
            ->andFilterWhere(['like', 'chat_type', $this->chat_type])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'entities', $this->entities]);

        return $dataProvider;
    }
}
