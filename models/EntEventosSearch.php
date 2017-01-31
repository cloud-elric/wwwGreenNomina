<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntEventos;

/**
 * EntEventosSearch represents the model behind the search form about `app\models\EntEventos`.
 */
class EntEventosSearch extends EntEventos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_convencion', 'id_cliente'], 'integer'],
            [[ 'txt_titulo', 'txt_descripcion', 'txt_direccion', 'txt_token', 'fch_inicio', 'fch_fin'], 'safe'],
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
    public function search($params, $idCliente)
    {
        $query = EntEventos::find()->where(['id_cliente'=>$idCliente]);

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
            'id_convencion' => $this->id_convencion,
            'id_cliente' => $this->id_cliente,
            'fch_inicio' => $this->fch_inicio,
            'fch_fin' => $this->fch_fin,
        ]);

        $query->andFilterWhere(['like', 'txt_titulo', $this->txt_titulo])
            ->andFilterWhere(['like', 'txt_descripcion', $this->txt_descripcion])
            ->andFilterWhere(['like', 'txt_direccion', $this->txt_direccion])
            ->andFilterWhere(['like', 'txt_token', $this->txt_token]);

        return $dataProvider;
    }
}
