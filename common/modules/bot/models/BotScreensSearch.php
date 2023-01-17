<?php

namespace common\modules\bot\models;

use common\modules\chat\models\ChatWidgets;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\bot\models\BotScreens;

/**
 * ScreensSearch represents the model behind the search form about `common\models\Screens`.
 */
class BotScreensSearch extends \common\modules\bot\models\BotScreens
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at','timeout','auth'], 'integer'],
            [['key', 'title', 'body', 'buttons','is_start','timeout','auth','platform'], 'safe'],
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
        $query = BotScreens::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'auth' => $this->auth,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);


        if (Yii::$app->user->can('user')) {

            $chatWidgets = ChatWidgets::find()->where(['user_id'=>Yii::$app->user->getId()])->asArray()->all();
            $txt=[];
            foreach ($chatWidgets as $item) {
                $txt [] = $item['id'];
            }



            $query->andWhere(['in','widget_id',$txt]);
        }

        $query->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'buttons', $this->buttons])
            ->andFilterWhere(['like', 'platform', $this->platform]);

        return $dataProvider;
    }
}
