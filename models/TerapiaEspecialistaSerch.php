<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TerapiaEspecialista;

/**
 * TerapiaEspecialistaSerch represents the model behind the search form about `app\models\TerapiaEspecialista`.
 */
class TerapiaEspecialistaSerch extends TerapiaEspecialista
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tpa_id', 'eta_cedula', 'pte_cedula'], 'integer'],
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
        $query = TerapiaEspecialista::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tpa_id' => $this->tpa_id,
            'eta_cedula' => $this->eta_cedula,
            'pte_cedula' => $this->pte_cedula,
        ]);

        return $dataProvider;
    }
}
