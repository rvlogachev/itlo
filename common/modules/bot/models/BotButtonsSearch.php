<?php
namespace common\modules\bot\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * ButtonsSearch represents the model behind the search form about `common\models\Buttons`.
 */
class BotButtonsSearch extends BotButtons
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url' ,'key', 'type', 'size', 'callback_data', 'text','color'], 'string'],
            [['id', 'updated_at', 'created_at',  'status', 'widget_text_id','request_location','request_contact'], 'integer'],
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
        $query = BotButtons::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'key' => $this->key,
            'type' => $this->type,
            'color' => $this->color,
            'size' => $this->size,
            'callback_data' => $this->callback_data,
            'text' => $this->text,
            'status' => $this->status,
            'widget_text_id' => $this->widget_text_id,
        ]);

        return $dataProvider;
    }
}
