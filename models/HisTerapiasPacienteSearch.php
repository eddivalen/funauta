<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HisTerapiasPaciente;

/**
 * HisTerapiasPacienteSearch represents the model behind the search form about `app\models\HisTerapiasPaciente`.
 */
class HisTerapiasPacienteSearch extends HisTerapiasPaciente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pte_cedula'], 'integer'],
            [['tiempo', 'descripcion'], 'safe'],
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
        $query = HisTerapiasPaciente::find();

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
            'pte_cedula' => $this->pte_cedula,
        ]);

        $query->andFilterWhere(['like', 'tiempo', $this->tiempo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
    public function searchFilter($id)
    {
        $query = HisTerapiasPaciente::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);

        /*if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

        // grid filtering conditions
        $query->andFilterWhere([
            'pte_cedula' => $id,
        ]);

        $query->andFilterWhere(['like', 'tiempo', $this->tiempo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
