<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Representante;

/**
 * RepresentanteSerch represents the model behind the search form about `app\models\Representante`.
 */
class RepresentanteSerch extends Representante
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'edad', 'nvo_id'], 'integer'],
            [['nombre', 'apellido', 'nacionalidad', 'edo_civil', 'direccion', 'telefono_local', 'telefono_celular', 'correo', 'ocupacion', 'empresa', 'horario_trabajo', 'actividad', 'disponibilidad'], 'safe'],
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
        $query = Representante::find();

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
            'edad' => $this->edad,
            'nvo_id' => $this->nvo_id,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'nacionalidad', $this->nacionalidad])
            ->andFilterWhere(['like', 'edo_civil', $this->edo_civil])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'telefono_local', $this->telefono_local])
            ->andFilterWhere(['like', 'telefono_celular', $this->telefono_celular])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'ocupacion', $this->ocupacion])
            ->andFilterWhere(['like', 'empresa', $this->empresa])
            ->andFilterWhere(['like', 'horario_trabajo', $this->horario_trabajo])
            ->andFilterWhere(['like', 'actividad', $this->actividad])
            ->andFilterWhere(['like', 'disponibilidad', $this->disponibilidad]);

        return $dataProvider;
    }
}
