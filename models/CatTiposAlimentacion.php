<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_tipos_alimentacion".
 *
 * @property string $id_alimentacion
 * @property string $txt_nombre_alimentacion
 *
 * @property EntDatosGenerales[] $entDatosGenerales
 */
class CatTiposAlimentacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_tipos_alimentacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre_alimentacion'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_alimentacion' => 'Id Alimentacion',
            'txt_nombre_alimentacion' => 'Txt Nombre Alimentacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosGenerales()
    {
        return $this->hasMany(EntDatosGenerales::className(), ['id_alimentacion' => 'id_alimentacion']);
    }
}
