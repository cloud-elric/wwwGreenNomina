<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_usuarios".
 *
 * @property string $id_usuario
 * @property string $txt_token
 * @property string $txt_nombre
 * @property string $txt_apellido_paterno
 * @property string $tel_numero_celular
 * @property string $num_esferas
 * @property string $fch_creacion
 */
class EntUsuarios extends \yii\db\ActiveRecord
{
	
	public $leido;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_usuarios_2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_token', 'txt_nombre', 'txt_apellido_paterno', 'tel_numero_celular','txt_email','num_edad', 'txt_cp'], 'required', 'message'=>'Campos requeridos'],
        	[['txt_email'], 'email', 'message'=>'Ingrese una dirección válida'],
            [['num_esferas'], 'integer', 'message'=>'Debe ser un valor númerico'],
        	[['tel_numero_celular'], 'string', 'max' => 10, 'message'=>'Maximo 10 digitos'],
        	[['tel_numero_celular'], 'string', 'min' => 10, 'message'=>'Mínimo 10 digitos'],
            [['fch_creacion'], 'safe'],
            [['txt_token'], 'string', 'max' => 60],
            [['txt_nombre', 'txt_apellido_paterno', 'tel_numero_celular'], 'string', 'max' => 50],
            [['txt_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'txt_token' => 'Txt Token',
            'txt_nombre' => 'Nombre',
            'txt_apellido_paterno' => 'Apellido Paterno',
            'tel_numero_celular' => 'Número Celular',
            'num_esferas' => 'Número Esferas',
            'fch_creacion' => 'Fch Creacion',
        ];
    }
}
