<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_listas_usuarios".
 *
 * @property string $id_lista
 * @property string $id_usuario
 *
 * @property EntListasUsuariosRegistrados $idLista
 * @property EntUsuarios2 $idUsuario
 */
class RelListasUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_listas_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_lista', 'id_usuario'], 'required'],
            [['id_lista', 'id_usuario'], 'integer'],
            [['id_lista'], 'exist', 'skipOnError' => true, 'targetClass' => EntListasUsuariosRegistrados::className(), 'targetAttribute' => ['id_lista' => 'id_lista_usuario_registrado']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => EntUsuarios2::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lista' => 'Id Lista',
            'id_usuario' => 'Id Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLista()
    {
        return $this->hasOne(EntListasUsuariosRegistrados::className(), ['id_lista_usuario_registrado' => 'id_lista']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(EntUsuarios2::className(), ['id_usuario' => 'id_usuario']);
    }
}
