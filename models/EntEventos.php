<?php

namespace app\models;

use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "ent_eventos".
 *
 * @property string $id_convencion
 * @property string $id_cliente
 * @property string $txt_titulo
 * @property string $txt_descripcion
 * @property string $txt_direccion
 * @property string $txt_token
 * @property string $fch_inicio
 * @property string $fch_fin
 *
 * @property EntClientes $idCliente
 * @property EntUsuarios2[] $entUsuarios2s
 */
class EntEventos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_convenciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente',  'txt_titulo', 'txt_descripcion', 'txt_direccion', 'txt_token'], 'required'],
            [['id_cliente'], 'integer'],
            [['fch_inicio', 'fch_fin'], 'safe'],
            [['txt_titulo'], 'string', 'max' => 50],
            [['txt_token'], 'string', 'max' => 60],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => EntClientes::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_convencion' => 'Id Evento',
            'id_cliente' => 'Id Cliente',
            'txt_titulo' => 'Titulo',
            'txt_descripcion' => 'Descripcion',
            'txt_direccion' => 'Direccion',
            'txt_token' => 'Txt Token',
            'fch_inicio' => 'Fecha Inicio',
            'fch_fin' => 'Fecha Final',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(EntClientes::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntUsuarios2s()
    {
        return $this->hasMany(EntUsuarios2::className(), ['id_convencion' => 'id_evento']);
    }
    
    /**
     * Busca evento por el id
     * @param unknown $id
     * @throws NotFoundHttpException
     * @return EntEventos
     */
    public static function searchClienteById($id) {
    	if (($evento = EntEventos::find ()->where ( [
    			'id_convencion' => $id
    	] )->one()) !== null) {
    		return $evento;
    	} else {
    		throw new NotFoundHttpException( 'The requested page does not exist.' );
    	}
    }
    
}
