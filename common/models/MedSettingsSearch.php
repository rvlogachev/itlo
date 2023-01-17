<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MedSettings;

/**
 * modelsMedSettingsSearch represents the model behind the search form about `common\models\MedSettings`.
 */
class MedSettingsSearch extends MedSettings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'printer_count'], 'integer'],
            [['reference_temp_ot', 'reference_temp_do', 'reference_bpp_up_ot', 'reference_bpp_up_do', 'reference_bpp_lower_ot', 'reference_bpp_lower_do', 'reference_bpp_pulse_ot', 'reference_bpp_pulse_do', 'reference_alco_ot', 'reference_alco_do'], 'number'],
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
        $query = MedSettings::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'reference_temp_ot' => $this->reference_temp_ot,
            'reference_temp_do' => $this->reference_temp_do,
            'reference_bpp_up_ot' => $this->reference_bpp_up_ot,
            'reference_bpp_up_do' => $this->reference_bpp_up_do,
            'reference_bpp_lower_ot' => $this->reference_bpp_lower_ot,
            'reference_bpp_lower_do' => $this->reference_bpp_lower_do,
            'reference_bpp_pulse_ot' => $this->reference_bpp_pulse_ot,
            'reference_bpp_pulse_do' => $this->reference_bpp_pulse_do,
            'reference_alco_ot' => $this->reference_alco_ot,
            'reference_alco_do' => $this->reference_alco_do,
        ]);

        return $dataProvider;
    }
}
