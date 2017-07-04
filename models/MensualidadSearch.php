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
    public $first_date;
    public $end_date;
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_pago', 'fecha', 'banco','rango_fecha','rte_cedula'], 'safe'],
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
        $query->joinWith('rteCedula');
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
           // 'rte_cedula' => $this->rte_cedula,
        ]);

        $query->andFilterWhere(['like', 'id_pago', $this->id_pago])
            ->andFilterWhere(['like', 'banco', $this->banco]);

        if(!empty($this->rango_fecha) && strpos($this->rango_fecha, '-') !== false){ 
            list($start_date, $end_date) = explode(' - ', $this->rango_fecha); 
            $query->where(['between','fecha',$start_date,$end_date])->all();
        }

         $query->andFilterWhere(['like', 'representante.nombre', $this->rte_cedula]);
         //$query->andFilterWhere(['like', 'representante.apellido', $this->rte_cedula]);

        return $dataProvider;
    }
    public function searchArray($id_pago,$rango_fecha,$banco,$rte_cedula)
    {
        $query = Mensualidad::find();
        $query->joinWith('rteCedula');

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'id_pago', $id_pago])
            ->andFilterWhere(['like', 'banco', $banco]);

        $query->andFilterWhere(['like', 'representante.nombre', $rte_cedula]);
        $query->andFilterWhere(['like', 'representante.apellido', $rte_cedula]);

        if(!empty($rango_fecha) && strpos($rango_fecha, '-') !== false)
        { 
            list($start_date, $end_date) = explode(' - ', $rango_fecha); 
            $first_date = $start_date;
            $query->where(['between','fecha',$start_date,$end_date])->all();
        }
       
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        'sort' => [
            'defaultOrder' => [
                'fecha' => SORT_ASC,
                ]
            ],
        ]);
       $array = $dataProvider->getModels();
        return $array;
    }
}
