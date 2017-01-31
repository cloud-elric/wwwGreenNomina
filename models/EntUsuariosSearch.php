<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntUsuarios2;

/**
 * EntUsuariosSearch represents the model behind the search form about `app\models\EntUsuarios2`.
 */
class EntUsuariosSearch extends EntUsuarios2
{   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_evento'], 'integer'],
            [['txt_nombre', 'txt_password', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_genero', 'fch_creacion'], 'safe'],
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
    public function search($params, $id)
    {
        $query = EntUsuarios2::find()->where(['id_evento'=>$id]);

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
            'id_usuario' => $this->id_usuario,
            'id_evento' => $this->id_evento,
            'fch_creacion' => $this->fch_creacion,
        ]);

        $query->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_password', $this->txt_password])
            ->andFilterWhere(['like', 'txt_apellido_paterno', $this->txt_apellido_paterno])
            ->andFilterWhere(['like', 'txt_apellido_materno', $this->txt_apellido_materno])
            ->andFilterWhere(['like', 'txt_genero', $this->txt_genero]);

        return $dataProvider;
    }
    
    public function searchCompleto($params, $id)
    {
    	$query = ViewUsuariosCompleto::find()->where(['id_evento'=>$id]);
    
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
    			'id_usuario' => $this->id_usuario,
    			'id_evento' => $this->id_evento,
    			'fch_creacion' => $this->fch_creacion,
    	]);
    
    	$query->andFilterWhere(['like', 'txt_nombre_usuario', $this->txt_nombre])
    	->andFilterWhere(['like', 'txt_apellido_paterno', $this->txt_apellido_paterno])
    	->andFilterWhere(['like', 'txt_apellido_materno', $this->txt_apellido_materno])
    	->andFilterWhere(['like', 'txt_genero', $this->txt_genero]);
    
    	return $dataProvider;
    }
}
