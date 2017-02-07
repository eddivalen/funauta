<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PacienteEvaluacion;

/**
 * PacienteEvaluacionSerch represents the model behind the search form about `app\models\PacienteEvaluacion`.
 */
class PacienteEvaluacionSerch extends PacienteEvaluacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'motivo'], 'safe'],
            [['pte_cedula', 'ecn_id'], 'integer'],
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
        $query = PacienteEvaluacion::find();

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
            'fecha' => $this->fecha,
            'pte_cedula' => $this->pte_cedula,
            'ecn_id' => $this->ecn_id,
        ]);

        $query->andFilterWhere(['like', 'motivo', $this->motivo]);

        return $dataProvider;
    }
}
