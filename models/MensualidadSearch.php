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
            [['id','monto'], 'integer'],
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
        $query->joinWith('mensualidadMeses');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'monto' => $this->monto
        ]);

        $query->andFilterWhere(['like', 'id_pago', $this->id_pago])
            ->andFilterWhere(['like', 'banco', $this->banco]);

        if(!empty($this->rango_fecha) && strpos($this->rango_fecha, '-') !== false){ 
            list($start_date, $end_date) = explode(' - ', $this->rango_fecha); 
            $query->where(['between','fecha',$start_date,$end_date])->all();
        }

         $query->andFilterWhere(['like', 'rte_cedula', $this->rte_cedula]);

        return $dataProvider;
    }
    public function searchArray($id_pago,$rango_fecha,$banco,$rte_cedula,$monto)
    {
        $query = Mensualidad::find();
        $query->joinWith('rteCedula');
        $query->joinWith('mensualidadMeses');

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 999999999,
            ]
        ]);
        $totalCount = $provider->getTotalCount();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $totalCount,
            ]
        ]);
        
        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            'monto' => $monto
        ]);

        $query->andFilterWhere(['like', 'id_pago', $id_pago])
            ->andFilterWhere(['like', 'banco', $banco]);

        $query->andFilterWhere(['like', 'rte_cedula', $rte_cedula]);

        if(!empty($rango_fecha) && strpos($rango_fecha, '-') !== false)
        { 
            list($start_date, $end_date) = explode(' - ', $rango_fecha); 
            $first_date = $start_date;
            $query->where(['between','fecha',$start_date,$end_date])->all();
        }
       
       $array = $dataProvider->getModels();
        return $array;
        
    }
}
