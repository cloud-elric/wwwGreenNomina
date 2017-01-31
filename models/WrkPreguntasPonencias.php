<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_preguntas_ponencias".
 *
 * @property string $id_pregunta
 * @property string $id_ponencia
 * @property string $id_usuario
 * @property string $txt_pregunta
 * @property string $txt_respuesta
 * @property string $b_aceptada
 * @property string $fch_creacion
 *
 * @property EntUsuarios2 $idUsuario
 * @property EntPonencias $idPonencia
 */
class WrkPreguntasPonencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wrk_preguntas_ponencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ponencia', 'txt_usuario', 'txt_pregunta'], 'required'],
            [['id_ponencia', 'id_usuario', 'b_aceptada'], 'integer'],
            [['txt_pregunta', 'txt_respuesta'], 'string'],
            [['fch_creacion'], 'safe'],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => EntUsuarios2::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
            [['id_ponencia'], 'exist', 'skipOnError' => true, 'targetClass' => EntPonencias::className(), 'targetAttribute' => ['id_ponencia' => 'id_ponencia']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pregunta' => 'Id Pregunta',
            'id_ponencia' => 'Id Ponencia',
            'id_usuario' => 'Id Usuario',
            'txt_pregunta' => 'Txt Pregunta',
            'txt_respuesta' => 'Txt Respuesta',
            'b_aceptada' => 'B Aceptada',
            'fch_creacion' => 'Fch Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(EntUsuarios2::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPonencia()
    {
        return $this->hasOne(EntPonencias::className(), ['id_ponencia' => 'id_ponencia']);
    }
}
