<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_datos_generales".
 *
 * @property string $id_usuario2
 * @property string $id_alimentacion
 * @property string $id_sangre2
 * @property integer $b_alergias
 * @property string $txt_alergias
 * @property integer $b_capacidades_diferentes
 * @property integer $b_padecimientos_especiales
 * @property string $txt_padecimientos
 *
 * @property CatTiposAlimentacion $idAlimentacion
 * @property EntUsuarios2 $idUsuario2
 * @property CatTipoSangre $idSangre2
 */
class EntDatosGenerales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_datos_generales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario2', 'id_alimentacion', 'id_sangre2', 'b_alergias', 'b_capacidades_diferentes', 'b_padecimientos_especiales'], 'required'],
            [['id_usuario2', 'id_alimentacion', 'id_sangre2', 'b_alergias', 'b_capacidades_diferentes', 'b_padecimientos_especiales'], 'integer'],
            [['txt_alergias', 'txt_padecimientos'], 'string', 'max' => 100],
            [['id_alimentacion'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposAlimentacion::className(), 'targetAttribute' => ['id_alimentacion' => 'id_alimentacion']],
            [['id_usuario2'], 'exist', 'skipOnError' => true, 'targetClass' => EntUsuarios2::className(), 'targetAttribute' => ['id_usuario2' => 'id_usuario']],
            [['id_sangre2'], 'exist', 'skipOnError' => true, 'targetClass' => CatTipoSangre::className(), 'targetAttribute' => ['id_sangre2' => 'id_sangre']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario2' => 'Id Usuario2',
            'id_alimentacion' => 'Id Alimentacion',
            'id_sangre2' => 'Id Sangre2',
            'b_alergias' => 'Alergias*',
        	'txt_alergias' => 'Mencione cuales*',
            'b_capacidades_diferentes' => 'Capacidades Diferentes*',
            'b_padecimientos_especiales' => 'Padecimientos Especiales*',
        		'txt_padecimientos' => 'Mencione cuales*',
        		'txt_capacidades' => 'Mencione cuales*',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAlimentacion()
    {
        return $this->hasOne(CatTiposAlimentacion::className(), ['id_alimentacion' => 'id_alimentacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario2()
    {
        return $this->hasOne(EntUsuarios2::className(), ['id_usuario' => 'id_usuario2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSangre2()
    {
        return $this->hasOne(CatTipoSangre::className(), ['id_sangre' => 'id_sangre2']);
    }
}