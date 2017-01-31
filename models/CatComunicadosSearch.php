<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatComunicados;

/**
 * CatComunicadosSearch represents the model behind the search form about `app\models\CatComunicados`.
 */
class CatComunicadosSearch extends CatComunicados
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_comunicado', 'id_template', 'id_evento', 'b_habilitado'], 'integer'],
            [['txt_nombre', 'txt_descripcion'], 'safe'],
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
    public function search($params, $idEvento)
    {
        $query = CatComunicados::find()->where(['id_evento'=>$idEvento]);

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
            'id_comunicado' => $this->id_comunicado,
            'id_template' => $this->id_template,
            'id_evento' => $this->id_evento,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_descripcion', $this->txt_descripcion]);

        return $dataProvider;
    }
}
