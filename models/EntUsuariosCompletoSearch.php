<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EntUsuarios2;

/**
 * EntUsuariosSearch represents the model behind the search form about `app\models\EntUsuarios2`.
 */
class EntUsuariosCompletoSearch extends ViewUsuariosCompleto
{   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_evento'], 'integer'],
            [
            	[
            		'txt_nombre_usuario',
            		'txt_apellido_paterno',
            		'txt_apellido_materno',
            		'txt_genero',
            		'fch_creacion',
	            	'id_estado',
            		'txt_ciudad',
            		'id_puesto',
            		'b_telefono_fijo',
            		'b_telefono_celular',
            		'txt_extension',
            		'txt_email',
            		'txt_genero',
            		'fch_creacion',
            		'id_alimentacion',
            		'id_sangre',
            		'txt_alergias',
            		'txt_capacidades',
            		'txt_padecimientos'
            	],	
	            'safe'],
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
        	'txt_nombre_estado' => $this->txt_nombre_estado
        ]);

        $query->andFilterWhere(['like', 'txt_nombre_usuario', $this->txt_nombre_usuario])
            //->andFilterWhere(['like', 'txt_password', $this->txt_password])
            ->andFilterWhere(['like', 'txt_apellido_paterno', $this->txt_apellido_paterno])
            ->andFilterWhere(['like', 'txt_apellido_materno', $this->txt_apellido_materno])
            ->andFilterWhere(['like', 'txt_genero', $this->txt_genero])
            ->andFilterWhere(['like', 'txt_nombre_estado', $this->txt_nombre_estado]);

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
    			'id_estado' => $this->id_estado,
    			'txt_ciudad' => $this->txt_ciudad,
    			'id_puesto' => $this->id_puesto,
    			'b_telefono_fijo' => $this->b_telefono_fijo,
    			'b_telefono_celular' => $this->b_telefono_celular,
    			'txt_extension' => $this->txt_extension,
    			'txt_genero' => $this->txt_genero,
    			'fch_creacion' => $this->fch_creacion,
    			'id_alimentacion' => $this->id_alimentacion,
    			'id_sangre' => $this->id_sangre,
    			'txt_alergias' => $this->txt_alergias,
    			'txt_capacidades' => $this->txt_capacidades,
    			'txt_padecimientos' => $this->txt_padecimientos,
    			'txt_email' => $this->txt_email
    	]);
    
    	$query->andFilterWhere(['like', 'txt_nombre_usuario', $this->txt_nombre_usuario])
    	->andFilterWhere(['like', 'txt_apellido_paterno', $this->txt_apellido_paterno])
    	->andFilterWhere(['like', 'txt_apellido_materno', $this->txt_apellido_materno])
    	->andFilterWhere(['like', 'txt_genero', $this->txt_genero])
    	->andFilterWhere(['like', 'id_estado', $this->id_estado])
    	->andFilterWhere(['like', 'txt_ciudad', $this->txt_ciudad])
    	->andFilterWhere(['like', 'id_puesto', $this->id_puesto])
    	->andFilterWhere(['like', 'b_telefono_fijo', $this->b_telefono_fijo])
    	->andFilterWhere(['like', 'b_telefono_celular', $this->b_telefono_celular])
    	->andFilterWhere(['like', 'txt_extension', $this->txt_extension])
    	->andFilterWhere(['like', 'txt_genero', $this->txt_genero])
    	->andFilterWhere(['like', 'fch_creacion', $this->fch_creacion])
    	->andFilterWhere(['like', 'id_alimentacion', $this->id_alimentacion])
    	->andFilterWhere(['like', 'id_sangre', $this->id_sangre])
    	->andFilterWhere(['like', 'txt_alergias', $this->txt_alergias])
    	->andFilterWhere(['like', 'txt_capacidades', $this->txt_capacidades])
    	->andFilterWhere(['like', 'txt_padecimientos', $this->txt_padecimientos])
    	->andFilterWhere(['like', 'txt_email', $this->txt_email]);
    
    	return $dataProvider;
    }
}
