<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mod_usuarios_ent_usuarios_cambio_pass".
 *
 * @property string $id_usuario_cambio_pass
 * @property string $id_usuario
 * @property string $txt_token
 * @property string $txt_ip
 * @property string $txt_ip_cambio
 * @property string $fch_creacion
 * @property string $fch_finalizacion
 * @property string $fch_peticion_usada
 * @property string $b_usado
 *
 * @property ModUsuariosEntUsuarios $idUsuario
 */
class ModUsuariosEntUsuariosCambioPass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mod_usuarios_ent_usuarios_cambio_pass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'txt_token', 'txt_ip'], 'required'],
            [['id_usuario', 'b_usado'], 'integer'],
            [['fch_creacion', 'fch_finalizacion', 'fch_peticion_usada'], 'safe'],
            [['txt_token'], 'string', 'max' => 60],
            [['txt_ip', 'txt_ip_cambio'], 'string', 'max' => 20],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => ModUsuariosEntUsuarios::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario_cambio_pass' => 'Id Usuario Cambio Pass',
            'id_usuario' => 'Id Usuario',
            'txt_token' => 'Txt Token',
            'txt_ip' => 'Txt Ip',
            'txt_ip_cambio' => 'Txt Ip Cambio',
            'fch_creacion' => 'Fch Creacion',
            'fch_finalizacion' => 'Fch Finalizacion',
            'fch_peticion_usada' => 'Fch Peticion Usada',
            'b_usado' => 'B Usado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(ModUsuariosEntUsuarios::className(), ['id_usuario' => 'id_usuario']);
    }
}
