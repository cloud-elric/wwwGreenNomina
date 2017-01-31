<?php

namespace app\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "ent_clientes".
 *
 * @property string $id_cliente
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $b_habilitado
 */
class EntClientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre'], 'required'],
            [['b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 100],
            [['txt_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Id Cliente',
            'txt_nombre' => 'Nombre',
            'txt_descripcion' => 'Descripcion',
            'b_habilitado' => 'Habilitado',
        ];
    }
    
    /**
	 * Busca cliente por el id
	 * @param unknown $id
	 * @throws NotFoundHttpException
	 * @return EntClientes
	 */
	 public static function searchClienteById($id) {
		if (($cliente = EntClientes::find ()->where ( [ 
				'id_cliente' => $id 
		] )->one()) !== null) {
			return $cliente;
		} else {
			throw new NotFoundHttpException( 'The requested page does not exist.' );
		}
	}
}
