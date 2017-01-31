<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_usuarios_2".
 *
 * @property string $id_usuario
 * @property string $id_evento
 * @property string $txt_nombre
 * @property string $txt_password
 * @property string $txt_apellido_paterno
 * @property string $txt_apellido_materno
 * @property string $txt_genero
 * @property string $fch_creacion
 *
 * @property EntDatosContacto $entDatosContacto
 * @property EntDatosGenerales $entDatosGenerales
 * @property EntDatosLaborales $entDatosLaborales
 * @property EntDatosUbicacion $entDatosUbicacion
 * @property EntEventos $idEvento
 * @property RelListasUsuarios[] $relListasUsuarios
 * @property EntListasUsuariosRegistrados[] $idListas
 */
class EntUsuarios2 extends \yii\db\ActiveRecord
{
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
       		[['id_evento'], 'integer'],
            [['txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno'], 'required'],
            [['txt_nombre', 'txt_apellido_paterno', 'txt_apellido_materno', 'txt_genero'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_evento' => 'Id Evento',
            'txt_nombre' => 'Nombre',
            'txt_password' => 'Password',
            'txt_apellido_paterno' => 'Apellido Paterno',
            'txt_apellido_materno' => 'Apellido Materno',
            'txt_genero' => 'Genero',
            'fch_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosContacto()
    {
        return $this->hasOne(EntDatosContacto::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosGenerales()
    {
        return $this->hasOne(EntDatosGenerales::className(), ['id_usuario2' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosLaborales()
    {
        return $this->hasOne(EntDatosLaborales::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosUbicacion()
    {
        return $this->hasOne(EntDatosUbicacion::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(EntEventos::className(), ['id_evento' => 'id_evento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelListasUsuarios()
    {
        return $this->hasMany(RelListasUsuarios::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdListas()
    {
        return $this->hasMany(EntListasUsuariosRegistrados::className(), ['id_lista_usuario_registrado' => 'id_lista'])->viaTable('rel_listas_usuarios', ['id_usuario' => 'id_usuario']);
    }
}
