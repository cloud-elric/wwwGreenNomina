<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntPonentes;

/**
 * EntPonentesSearch represents the model behind the search form about `app\models\EntPonentes`.
 */
class EntPonentesSearch extends EntPonentes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ponente', 'id_convencion', 'b_vip', 'b_habilitado'], 'integer'],
            [['txt_nombre', 'txt_apellido_p', 'txt_apellido_m', 'txt_job', 'txt_descripcion', 'txt_nombre_archivo'], 'safe'],
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
        $query = EntPonentes::find();

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
            'id_ponente' => $this->id_ponente,
            'id_convencion' => $this->id_convencion,
            'b_vip' => $this->b_vip,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_apellido_p', $this->txt_apellido_p])
            ->andFilterWhere(['like', 'txt_apellido_m', $this->txt_apellido_m])
            ->andFilterWhere(['like', 'txt_job', $this->txt_job])
            ->andFilterWhere(['like', 'txt_descripcion', $this->txt_descripcion])
            ->andFilterWhere(['like', 'txt_nombre_archivo', $this->txt_nombre_archivo]);

        return $dataProvider;
    }
}
