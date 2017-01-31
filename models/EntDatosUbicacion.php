<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_datos_ubicacion".
 *
 * @property string $id_usuario
 * @property string $id_pais
 * @property integer $id_estado
 * @property string $txt_ciudad
 * @property string $b_visa
 *
 * @property CatEstados $idEstado
 * @property CatPaises $idPais
 * @property EntUsuarios2 $idUsuario
 */
class EntDatosUbicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_datos_ubicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'txt_ciudad'], 'required'],
            [['id_usuario', 'id_pais', 'id_estado', 'b_visa'], 'integer'],
            [['txt_ciudad'], 'string', 'max' => 50],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstados::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
            [['id_pais'], 'exist', 'skipOnError' => true, 'targetClass' => CatPaises::className(), 'targetAttribute' => ['id_pais' => 'id_pais']],
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
            'id_pais' => 'Id Pais',
            'id_estado' => 'Id Estado',
            'txt_ciudad' => 'Txt Ciudad',
             'b_visa' => '¿Requieres visa?',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(CatEstados::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPais()
    {
        return $this->hasOne(CatPaises::className(), ['id_pais' => 'id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(EntUsuarios2::className(), ['id_usuario' => 'id_usuario']);
    }
}
