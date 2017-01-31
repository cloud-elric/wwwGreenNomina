<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_tipo_sangre".
 *
 * @property string $id_sangre
 * @property string $txt_nombre_sangre
 *
 * @property EntDatosGenerales[] $entDatosGenerales
 */
class CatTipoSangre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_tipo_sangre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre_sangre'], 'required'],
            [['txt_nombre_sangre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sangre' => 'Id Sangre',
            'txt_nombre_sangre' => 'Txt Nombre Sangre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosGenerales()
    {
        return $this->hasMany(EntDatosGenerales::className(), ['id_sangre2' => 'id_sangre']);
    }
}
