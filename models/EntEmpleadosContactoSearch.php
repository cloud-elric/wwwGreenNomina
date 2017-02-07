<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntEmpleadosContactos;

/**
 * EntEmpleadosContactoSearch represents the model behind the search form about `app\models\EntEmpleadosContactos`.
 */
class EntEmpleadosContactoSearch extends EntEmpleadosContactos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado'], 'integer'],
            [['txt_telefono_contacto', 'txt_mail_contacto'], 'safe'],
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
        $query = EntEmpleadosContactos::find();

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
        ]);

        $query->andFilterWhere(['like', 'txt_telefono_contacto', $this->txt_telefono_contacto])
            ->andFilterWhere(['like', 'txt_mail_contacto', $this->txt_mail_contacto]);

        return $dataProvider;
    }
}
