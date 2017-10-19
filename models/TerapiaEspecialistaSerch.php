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
            [['pte_cedula','eta_cedula','tpa_id'],'safe'],
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
        $query->joinWith('pteCedula');
        $query->joinWith('etaCedula');
        $query->joinWith('tpa');
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
           // 'tpa_id' => $this->tpa_id,
           // 'eta_cedula' => $this->eta_cedula,
           // 'pte_cedula' => $this->pte_cedula,
        ]);
        $query->andFilterWhere(['like', 'terapia.descripcion', $this->tpa_id]);
        $query->andFilterWhere(['like', 'paciente.nombre', $this->pte_cedula]);
        $query->andFilterWhere(['like', 'especialista.nombre', $this->eta_cedula]);

        return $dataProvider;
    }
    public function searchArray($tpa_id,$pte_cedula)
    {
        $query = TerapiaEspecialista::find();
        $query->joinWith('pteCedula');
        $query->joinWith('tpa');

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 999999999,
            ]
        ]);
        $totalCount = $provider->getTotalCount();
        echo $totalCount;
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $totalCount,
            ]
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'terapia.descripcion', $tpa_id]);
        $query->andFilterWhere(['like', 'paciente.nombre', $pte_cedula]);

        $array = $dataProvider->getModels();
        return $array;
    }
}
