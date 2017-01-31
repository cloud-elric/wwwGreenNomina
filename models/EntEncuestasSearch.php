<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntEncuestas;

/**
 * EntEncuestasSearch represents the model behind the search form about `app\models\EntEncuestas`.
 */
class EntEncuestasSearch extends EntEncuestas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_encuesta', 'id_ponencia', 'id_convencion'], 'integer'],
            [['txt_nombre', 'b_habilitado'], 'safe'],
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
        $query = EntEncuestas::find();

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
            'id_encuesta' => $this->id_encuesta,
            'id_ponencia' => $this->id_ponencia,
            'id_convencion' => $this->id_convencion,
        ]);

        $query->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'b_habilitado', $this->b_habilitado]);

        return $dataProvider;
    }
}
