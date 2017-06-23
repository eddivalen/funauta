<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Historia;

/**
 * HistoriaSerch represents the model behind the search form about `app\models\Historia`.
 */
class HistoriaSerch extends Historia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tto_id', 'tta_tpa_id'], 'integer'],
            [['fecha', 'observaciones','tta_eta_cedula'], 'safe'],
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
        $query = Historia::find();
        $query->joinWith('espName');
      //  $query->joinWith('etaCedula');
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
            'id' => $this->id,
            'fecha' => $this->fecha,
            'tto_id' => $this->tto_id,
            'tta_tpa_id' => $this->tta_tpa_id,
            //'tta_eta_cedula' => $this->tta_eta_cedula,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);
        $query->andFilterWhere(['like', 'especialista.nombre', $this->tta_eta_cedula]);

        return $dataProvider;
    }
    public function searchArray($params)
    {
        $query = Historia::find();
        $query->joinWith('espName');
      //  $query->joinWith('etaCedula');
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
            'id' => $this->id,
            'fecha' => $this->fecha,
            'tto_id' => $this->tto_id,
            'tta_tpa_id' => $this->tta_tpa_id,
            //'tta_eta_cedula' => $this->tta_eta_cedula,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);
        $query->andFilterWhere(['like', 'especialista.nombre', $this->tta_eta_cedula]);

        $array = $dataProvider->getModels();
        return $array;
    }
}
