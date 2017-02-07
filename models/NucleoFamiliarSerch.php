<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NucleoFamiliar;

/**
 * NucleoFamiliarSerch represents the model behind the search form about `app\models\NucleoFamiliar`.
 */
class NucleoFamiliarSerch extends NucleoFamiliar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'madre', 'padre', 'compmadre', 'comppadre', 'hermanos', 'hermanas', 'tias', 'tios', 'abuelo', 'otros'], 'integer'],
            [['descripcion'], 'safe'],
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
        $query = NucleoFamiliar::find();

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
            'madre' => $this->madre,
            'padre' => $this->padre,
            'compmadre' => $this->compmadre,
            'comppadre' => $this->comppadre,
            'hermanos' => $this->hermanos,
            'hermanas' => $this->hermanas,
            'tias' => $this->tias,
            'tios' => $this->tios,
            'abuelo' => $this->abuelo,
            'otros' => $this->otros,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
