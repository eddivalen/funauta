<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NivelSocioeconomico;

/**
 * NivelSocioeconomicoSerch represents the model behind the search form about `app\models\NivelSocioeconomico`.
 */
class NivelSocioeconomicoSerch extends NivelSocioeconomico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['vivienda', 'transporte'], 'safe'],
            [['ingresos'], 'number'],
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
        $query = NivelSocioeconomico::find();

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
            'ingresos' => $this->ingresos,
        ]);

        $query->andFilterWhere(['like', 'vivienda', $this->vivienda])
            ->andFilterWhere(['like', 'transporte', $this->transporte]);

        return $dataProvider;
    }
}
