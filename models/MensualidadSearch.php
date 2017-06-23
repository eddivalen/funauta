<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mensualidad;

/**
 * MensualidadSearch represents the model behind the search form about `app\models\Mensualidad`.
 */
class MensualidadSearch extends Mensualidad
{
    /**
     * @inheritdoc
     */
    public $rango_fecha;
    public function rules()
    {
        return [
            [['id', 'rte_cedula'], 'integer'],
            [['id_pago', 'fecha', 'banco','rango_fecha'], 'safe'],
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
        $query = Mensualidad::find();

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
            'rte_cedula' => $this->rte_cedula,
        ]);

        $query->andFilterWhere(['like', 'id_pago', $this->id_pago])
            ->andFilterWhere(['like', 'banco', $this->banco]);

        if(!empty($this->rango_fecha) && strpos($this->rango_fecha, '-') !== false) { list($start_date, $end_date) = explode(' - ', $this->rango_fecha); $query->andFilterWhere(['between', 'mensualidad.fecha', strtotime($start_date), strtotime($end_date)]); 
        }
        return $dataProvider;
    }
    public function searchArray($params)
    {
        $query = Mensualidad::find();

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
            'rte_cedula' => $this->rte_cedula,
        ]);

        $query->andFilterWhere(['like', 'id_pago', $this->id_pago])
            ->andFilterWhere(['like', 'banco', $this->banco]);

        if(!empty($this->rango_fecha) && strpos($this->rango_fecha, '-') !== false) { list($start_date, $end_date) = explode(' - ', $this->rango_fecha); $query->andFilterWhere(['between', 'mensualidad.fecha', strtotime($start_date), strtotime($end_date)]); 
        }
        $array = $dataProvider->getModels();
        return $array;
    }
}
