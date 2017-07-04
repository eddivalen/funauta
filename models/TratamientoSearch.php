<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tratamiento;

/**
 * TratamientoSearch represents the model behind the search form about `app\models\Tratamiento`.
 */
class TratamientoSearch extends Tratamiento
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mto_id'], 'integer'],
            [['indicaciones', 'dosis', 'posologia','nombre_tratamiento','pte_cedula'], 'safe'],
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
        $query = Tratamiento::find();
        $query->joinWith('pteCedula');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'mto_id' => $this->mto_id,
        ]);

        $query->andFilterWhere(['like', 'indicaciones', $this->indicaciones])
            ->andFilterWhere(['like', 'dosis', $this->dosis])
            ->andFilterWhere(['like', 'posologia', $this->posologia]);
        $query->andFilterWhere(['like', 'nombre_tratamiento', $this->nombre_tratamiento]);
        $query->andFilterWhere(['like', 'paciente.nombre', $this->pte_cedula]);
        

        return $dataProvider;
    }
    public function searchArray($nombre_tratamiento,$pte_cedula)
    {
        $query = Tratamiento::find();
        $query->joinWith('pteCedula');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'nombre_tratamiento', $nombre_tratamiento]);
        $query->andFilterWhere(['like', 'paciente.nombre', $pte_cedula]);
        
        $array = $dataProvider->getModels();
        return $array;
    }
}
