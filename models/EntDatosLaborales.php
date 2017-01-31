<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_datos_laborales".
 *
 * @property string $id_usuario
 * @property string $id_puesto
 * @property string $txt_canal
 *
 * @property CatNivelesPuestos $idPuesto
 * @property EntUsuarios2 $idUsuario
 */
class EntDatosLaborales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_datos_laborales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_puesto'], 'required'],
            [['id_usuario', 'id_puesto'], 'integer'],
            [['txt_canal', 'txt_otro'], 'string', 'max' => 50],
            [['id_puesto'], 'exist', 'skipOnError' => true, 'targetClass' => CatNivelesPuestos::className(), 'targetAttribute' => ['id_puesto' => 'id_puesto']],
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
            'id_puesto' => 'Puesto',
            'txt_canal' => 'Canal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPuesto()
    {
        return $this->hasOne(CatNivelesPuestos::className(), ['id_puesto' => 'id_puesto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(EntUsuarios2::className(), ['id_usuario' => 'id_usuario']);
    }
}
