<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BalanceHistory;

/**
 * BalanceHistorySearch represents the model behind the search form about `common\models\BalanceHistory`.
 */
class BalanceHistorySearch extends BalanceHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'terminal_id', 'old', 'new'], 'integer'],
            [['date_report', 'value', 'reason', 'type'], 'safe'],
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
        $query = BalanceHistory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
	        'sort' => [
		        'defaultOrder' => [
			        'id' => SORT_DESC,

		        ]
	        ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

	    if(!empty($this->date_report)){
		    $dates = explode(" ", $this->date_report);
		    $query->andFilterWhere([
			    // 'date(date_report)' => date("Y-m-d", strtotime($this->date_report))
			    'between', 'date(date_report)', date("Y-m-d", strtotime(trim($dates[0]))), date("Y-m-d", strtotime(trim($dates[2])))
		    ]);
	    }


        $query->andFilterWhere([
            'id' => $this->id,
            'company_id' => $this->company_id,
            'terminal_id' => $this->terminal_id,

            'type' => $this->type,
        ]);

	    $query->andFilterWhere(['like', 'old', $this->old])
		    ->andFilterWhere(['like', 'new', $this->new])

		    ->andFilterWhere(['like', 'value', $this->value])
		    ->andFilterWhere(['like', 'reason', $this->reason]);



        return $dataProvider;
    }
}
