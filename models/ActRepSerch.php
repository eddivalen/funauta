<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ActRep;

/**
 * ActRepSerch represents the model behind the search form about `app\models\ActRep`.
 */
class ActRepSerch extends ActRep
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ate_id', 'rte_cedula'], 'safe']
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
        $query = ActRep::find();

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

        $query->joinWith('ate')->joinWith('rteCedula');

        $query->andFilterWhere(['like', 'actividades.nombre_act', $this->ate_id])
              ->andFilterWhere(['like', 'representante.nombre', $this->rte_cedula])
              ->andFilterWhere(['like', 'rte_cedula', $this->id]);

        return $dataProvider;
    }
}