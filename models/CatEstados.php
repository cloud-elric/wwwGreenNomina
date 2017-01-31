<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_estados".
 *
 * @property integer $id_estado
 * @property string $id_pais
 * @property string $txt_clave
 * @property string $txt_nombre
 * @property string $txt_abrev
 * @property integer $b_habilitado
 *
 * @property CatPaises $idPais
 * @property EntDatosUbicacion[] $entDatosUbicacions
 */
class CatEstados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pais', 'txt_clave', 'txt_nombre', 'txt_abrev'], 'required'],
            [['id_pais', 'b_habilitado'], 'integer'],
            [['txt_clave'], 'string', 'max' => 2],
            [['txt_nombre'], 'string', 'max' => 45],
            [['txt_abrev'], 'string', 'max' => 16],
            [['id_pais'], 'exist', 'skipOnError' => true, 'targetClass' => CatPaises::className(), 'targetAttribute' => ['id_pais' => 'id_pais']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'id_pais' => 'Id Pais',
            'txt_clave' => 'Clave',
            'txt_nombre' => 'Nombre',
            'txt_abrev' => 'Abrev',
            'b_habilitado' => 'B Habilitado',
        ];
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
    public function getEntDatosUbicacions()
    {
        return $this->hasMany(EntDatosUbicacion::className(), ['id_estado' => 'id_estado']);
    }
}
