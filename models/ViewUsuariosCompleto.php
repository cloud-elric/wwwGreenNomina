<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_usuarios_completo".
 *
 * @property string $id_usuario
 * @property string $id_evento
 * @property string $txt_nombre_usuario
 * @property string $txt_apellido_paterno
 * @property string $txt_apellido_materno
 * @property string $txt_genero
 * @property string $fch_creacion
 * @property string $txt_pais
 * @property string $txt_nombre_estado
 * @property string $txt_ciudad
 * @property string $txt_nombre_alimentacion
 * @property string $txt_nombre_sangre
 * @property string $alergias
 * @property string $txt_alergias
 * @property string $capacidades
 * @property string $txt_capacidades
 * @property string $padecimientos
 * @property string $txt_padecimientos
 * @property string $txt_nombre_puesto
 * @property string $txt_otro
 * @property string $b_telefono_celular
 * @property string $b_telefono_fijo
 * @property string $txt_extension
 * @property string $txt_email
 * @property string $asistente
 * @property string $b_tel_cel_asistente
 * @property string $b_tel_fijo_asistente
 */
class ViewUsuariosCompleto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_usuarios_completo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_evento'], 'integer'],
            [['id_evento', 'txt_nombre_usuario', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_genero'], 'required'],
            [['fch_creacion'], 'safe'],
            [['txt_nombre_usuario', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_genero', 'txt_ciudad', 'txt_nombre_alimentacion', 'txt_nombre_sangre', 'txt_nombre_puesto', 'txt_otro', 'txt_email', 'b_tel_cel_asistente', 'b_tel_fijo_asistente'], 'string', 'max' => 50],
            [['txt_pais', 'txt_alergias', 'txt_capacidades', 'txt_padecimientos'], 'string', 'max' => 100],
            [['txt_nombre_estado'], 'string', 'max' => 45],
            [['alergias', 'capacidades', 'padecimientos', 'asistente'], 'string', 'max' => 2],
            [['b_telefono_celular', 'b_telefono_fijo', 'txt_extension'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
        	'id_estado'=>'Estado',
            'id_evento' => 'Id Evento',
            'txt_nombre_usuario' => 'Nombre Usuario',
            'txt_apellido_paterno' => 'Apellido Paterno',
            'txt_apellido_materno' => 'Apellido Materno',
            'txt_genero' => 'Genero',
            'fch_creacion' => 'Fecha Creacion',
            'txt_pais' => 'Pais',
            'txt_nombre_estado' => 'Estado',
            'txt_ciudad' => 'Ciudad',
            'txt_nombre_alimentacion' => 'Alimentacion',
            'txt_nombre_sangre' => 'Tipo Sangre',
            'alergias' => 'Alergias',
            'txt_alergias' => 'Alergias cuales',
            'capacidades' => 'Capacidades',
            'txt_capacidades' => 'Capacidades cuales',
            'padecimientos' => 'Padecimientos',
            'txt_padecimientos' => 'Padecimientos cuales',
            'txt_nombre_puesto' => 'Puesto',
            'txt_otro' => 'Otro',
            'b_telefono_celular' => 'Telefono Celular',
            'b_telefono_fijo' => 'Telefono Fijo',
            'txt_extension' => 'Extension',
            'txt_email' => 'Email',
            'asistente' => 'Asistente',
            'b_tel_cel_asistente' => 'Telefono Cel. Asistente',
            'b_tel_fijo_asistente' => 'Telefono Fijo Asistente',
        ];
    }
}
