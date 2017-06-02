<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PacienteEvaluacion;

/**
 * PacienteEvaluacionSearch represents the model behind the search form about `app\models\PacienteEvaluacion`.
 */
class PacienteEvaluacionSearch extends PacienteEvaluacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pte_cedula', 'eta_cedula'], 'integer'],
            [['fecha', 'motivo', 'descripcion'], 'safe'],
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
            'id' => $this->id,
            'fecha' => $this->fecha,
            'pte_cedula' => $this->pte_cedula,
            'eta_cedula' => $this->eta_cedula,
        ]);

        $query->andFilterWhere(['like', 'motivo', $this->motivo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
