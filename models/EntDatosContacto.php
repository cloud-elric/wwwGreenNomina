<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_datos_contacto".
 *
 * @property string $id_usuario
 * @property string $b_telefono_celular
 * @property string $b_telefono_fijo
 * @property string $txt_email
 * @property string $txt_email_confirmar
 * @property string $b_asistente
 * @property string $txt_email_asistente
 * @property string $txt_extension
 * @property string $b_tel_cel_asistente
 * @property string $b_tel_fijo_asistente
 *
 * @property EntUsuarios2 $idUsuario
 */
class EntDatosContacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_datos_contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'b_telefono_fijo', 'txt_email', 'txt_email_confirmar', 'b_asistente'], 'required'],
            [['id_usuario', 'b_telefono_celular', 'b_telefono_fijo', 'b_asistente'], 'integer'],
            [['txt_email', 'txt_email_confirmar', 'txt_email_asistente', 'b_tel_cel_asistente', 'b_tel_fijo_asistente', 'txt_extension'], 'string', 'max' => 50],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => EntUsuarios2::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'b_telefono_celular' => 'B Telefono Celular',
            'b_telefono_fijo' => 'B Telefono Fijo',
            'txt_email' => 'Txt Email',
            'txt_email_confirmar' => 'Txt Email Confirmar',
            'b_asistente' => '¿Tienes asistente?*',
            'txt_email_asistente' => 'Txt Email Asistente',
            'b_tel_cel_asistente' => 'B Tel Cel Asistente',
            'b_tel_fijo_asistente' => 'B Tel Fijo Asistente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(EntUsuarios2::className(), ['id_usuario' => 'id_usuario']);
    }
}