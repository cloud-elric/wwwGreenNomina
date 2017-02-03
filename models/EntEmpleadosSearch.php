<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntEmpleados;

/**
 * EntEmpleadosSearch represents the model behind the search form about `app\models\EntEmpleados`.
 */
class EntEmpleadosSearch extends EntEmpleados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'id_sucursal', 'id_tipo_contrato', 'id_nomina', 'num_empleado', 'b_habilitado'], 'integer'],
            [['txt_nombre', 'txt_observaciones', 'txt_rfc', 'num_seguro_social', 'fch_alta', 'fch_baja'], 'safe'],
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
        $query = EntEmpleados::find()->where(['b_habilitado'=>1]);

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
            'id_empleado' => $this->id_empleado,
            'id_sucursal' => $this->id_sucursal,
            'id_tipo_contrato' => $this->id_tipo_contrato,
            'id_nomina' => $this->id_nomina,
            'num_empleado' => $this->num_empleado,
            'fch_alta' => $this->fch_alta,
            'fch_baja' => $this->fch_baja,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_observaciones', $this->txt_observaciones])
            ->andFilterWhere(['like', 'txt_rfc', $this->txt_rfc])
            ->andFilterWhere(['like', 'num_seguro_social', $this->num_seguro_social]);

        return $dataProvider;
    }
}
