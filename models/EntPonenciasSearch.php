<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntPonencias;

/**
 * EntPonenciasSearch represents the model behind the search form about `app\models\EntPonencias`.
 */
class EntPonenciasSearch extends EntPonencias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ponencia', 'id_convencion', 'num_cupo', 'num_dia', 'num_orden', 'num_asistentes', 'b_vip', 'b_receso', 'b_habilitado'], 'integer'],
            [['txt_titulo', 'txt_actividad', 'txt_descripcion', 'txt_notas', 'txt_lugar', 'txt_hora_inicio', 'txt_duracion', 'txt_imagen_header', 'txt_grupo', 'txt_ico'], 'safe'],
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
    public function search($params,$id)
    {
        $query = EntPonencias::find()->where(['id_tipo_ponencia'=>1])->andWhere(['id_convencion'=>$id]);

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
            'id_ponencia' => $this->id_ponencia,
        	'id_tipo_ponencia'=>$this->id_tipo_ponencia,
            'id_convencion' => $this->id_convencion,
            'num_cupo' => $this->num_cupo,
            'num_dia' => $this->num_dia,
            'num_orden' => $this->num_orden,
            'num_asistentes' => $this->num_asistentes,
            'b_vip' => $this->b_vip,
            'b_receso' => $this->b_receso,
            'b_habilitado' => $this->b_habilitado,
        ]);

        $query->andFilterWhere(['like', 'txt_titulo', $this->txt_titulo])
            ->andFilterWhere(['like', 'txt_actividad', $this->txt_actividad])
            ->andFilterWhere(['like', 'txt_descripcion', $this->txt_descripcion])
            ->andFilterWhere(['like', 'txt_notas', $this->txt_notas])
            ->andFilterWhere(['like', 'txt_lugar', $this->txt_lugar])
            ->andFilterWhere(['like', 'txt_hora_inicio', $this->txt_hora_inicio])
            ->andFilterWhere(['like', 'txt_duracion', $this->txt_duracion])
            ->andFilterWhere(['like', 'txt_imagen_header', $this->txt_imagen_header])
            ->andFilterWhere(['like', 'txt_grupo', $this->txt_grupo])
            ->andFilterWhere(['like', 'txt_ico', $this->txt_ico]);

        return $dataProvider;
    }
    
    public function searchParaPreguntas($params)
    {
    	$query = EntPonencias::find()->where(['b_receso'=>0]);
    
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
    			'id_tipo_ponencia'=>$this->id_tipo_ponencia,
    			'id_ponencia' => $this->id_ponencia,
    			'id_convencion' => $this->id_convencion,
    			'num_cupo' => $this->num_cupo,
    			'num_dia' => $this->num_dia,
    			'num_orden' => $this->num_orden,
    			'num_asistentes' => $this->num_asistentes,
    			'b_vip' => $this->b_vip,
    			'b_receso' => $this->b_receso,
    			'b_habilitado' => $this->b_habilitado,
    	]);
    
    	$query->andFilterWhere(['like', 'txt_titulo', $this->txt_titulo])
    	->andFilterWhere(['like', 'txt_actividad', $this->txt_actividad])
    	->andFilterWhere(['like', 'txt_descripcion', $this->txt_descripcion])
    	->andFilterWhere(['like', 'txt_notas', $this->txt_notas])
    	->andFilterWhere(['like', 'txt_lugar', $this->txt_lugar])
    	->andFilterWhere(['like', 'txt_hora_inicio', $this->txt_hora_inicio])
    	->andFilterWhere(['like', 'txt_duracion', $this->txt_duracion])
    	->andFilterWhere(['like', 'txt_imagen_header', $this->txt_imagen_header])
    	->andFilterWhere(['like', 'txt_grupo', $this->txt_grupo])
    	->andFilterWhere(['like', 'txt_ico', $this->txt_ico]);
    
    	return $dataProvider;
    }
    
    public function searchActividades($params,$id)
    {
    	$query = EntPonencias::find()->where(['id_convencion'=>$id]);
    
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
    			'id_ponencia' => $this->id_ponencia,
    			'id_convencion' => $this->id_convencion,
    			'num_cupo' => $this->num_cupo,
    			'num_dia' => $this->num_dia,
    			'num_orden' => $this->num_orden,
    			'num_asistentes' => $this->num_asistentes,
    			'b_vip' => $this->b_vip,
    			'b_receso' => $this->b_receso,
    			'b_habilitado' => $this->b_habilitado,
    	]);
    
    	$query->andFilterWhere(['like', 'txt_titulo', $this->txt_titulo])
    	->andFilterWhere(['like', 'txt_actividad', $this->txt_actividad])
    	->andFilterWhere(['like', 'txt_descripcion', $this->txt_descripcion])
    	->andFilterWhere(['like', 'txt_notas', $this->txt_notas])
    	->andFilterWhere(['like', 'txt_lugar', $this->txt_lugar])
    	->andFilterWhere(['like', 'txt_hora_inicio', $this->txt_hora_inicio])
    	->andFilterWhere(['like', 'txt_duracion', $this->txt_duracion])
    	->andFilterWhere(['like', 'txt_imagen_header', $this->txt_imagen_header])
    	->andFilterWhere(['like', 'txt_grupo', $this->txt_grupo])
    	->andFilterWhere(['like', 'txt_ico', $this->txt_ico]);
    
    	return $dataProvider;
    }
}
