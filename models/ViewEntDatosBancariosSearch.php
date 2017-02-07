<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntDatosBancarios;

/**
 * ViewEntDatosBancariosSearch represents the model behind the search form about `app\models\EntDatosBancarios`.
 */
class ViewEntDatosBancariosSearch extends EntDatosBancarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_dato_bancario', 'id_banco', 'id_empleado', 'b_habilitado'], 'integer'],
            [['txt_numero_cuenta', 'txt_clabe'], 'safe'],
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
        $query = EntDatosBancarios::find();

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
            'id_dato_bancario' => $this->id_dato_bancario,
            'id_banco' => $this->id_banco,
            'id_empleado' => $this->id_empleado,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'txt_numero_cuenta', $this->txt_numero_cuenta])
            ->andFilterWhere(['like', 'txt_clabe', $this->txt_clabe]);

        return $dataProvider;
    }
}
