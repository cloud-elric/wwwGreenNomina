<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_niveles_puestos".
 *
 * @property string $id_puesto
 * @property string $txt_nombre_puesto
 * @property string $txt_descripcion
 * @property integer $b_habilitado
 *
 * @property EntDatosLaborales[] $entDatosLaborales
 */
class CatNivelesPuestos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_niveles_puestos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre_puesto', 'txt_descripcion'], 'required'],
            [['b_habilitado'], 'integer'],
            [['txt_nombre_puesto', 'txt_descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_puesto' => 'Id Puesto',
            'txt_nombre_puesto' => 'Txt Nombre Puesto',
            'txt_descripcion' => 'Txt Descripcion',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosLaborales()
    {
        return $this->hasMany(EntDatosLaborales::className(), ['id_puesto' => 'id_puesto']);
    }
}
