<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_listas_usuarios_registrados".
 *
 * @property string $id_lista_usuario_registrado
 * @property string $txt_nombre
 * @property string $b_habilitado
 *
 * @property RelListasUsuarios[] $relListasUsuarios
 * @property EntUsuarios2[] $idUsuarios
 */
class EntListasUsuariosRegistrados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_listas_usuarios_registrados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre'], 'required'],
            [['b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_lista_usuario_registrado' => 'Id Lista Usuario Registrado',
            'txt_nombre' => 'Nombre',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelListasUsuarios()
    {
        return $this->hasMany(RelListasUsuarios::className(), ['id_lista' => 'id_lista_usuario_registrado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuarios()
    {
        return $this->hasMany(EntUsuarios2::className(), ['id_usuario' => 'id_usuario'])->viaTable('rel_listas_usuarios', ['id_lista' => 'id_lista_usuario_registrado']);
    }
}
