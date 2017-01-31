<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_paises".
 *
 * @property string $id_pais
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $b_habilitado
 *
 * @property CatEstados[] $catEstados
 * @property EntDatosUbicacion[] $entDatosUbicacions
 */
class CatPaises extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_paises';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre'], 'required'],
            [['b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 100],
            [['txt_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pais' => 'Id Pais',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatEstados()
    {
        return $this->hasMany(CatEstados::className(), ['id_pais' => 'id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosUbicacions()
    {
        return $this->hasMany(EntDatosUbicacion::className(), ['id_pais' => 'id_pais']);
    }
}
