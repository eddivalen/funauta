<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Paciente;

/**
 * PacienteSerch represents the model behind the search form about `app\models\Paciente`.
 */
class PacienteSerch extends Paciente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'edad', 'rte_cedula', 'ico_id', 'nca_id'], 'integer'],
            [['nombre', 'apellido', 'fecha_nacimiento', 'lugar_nacimiento', 'sexo'], 'safe'],
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
        $query = Paciente::find();

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
            'cedula' => $this->cedula,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'edad' => $this->edad,
            'rte_cedula' => $this->rte_cedula,
            'ico_id' => $this->ico_id,
            'nca_id' => $this->nca_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'lugar_nacimiento', $this->lugar_nacimiento])
            ->andFilterWhere(['like', 'sexo', $this->sexo]);

        return $dataProvider;
    }
}
