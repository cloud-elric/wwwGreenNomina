<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_respuestas_encuestas".
 *
 * @property string $id_respuesta
 * @property string $id_pregunta
 * @property string $id_usuario
 * @property string $txt_valor
 * @property string $txt_nombre_usuario
 *
 * @property EntPreguntasEncuestas $idPregunta
 */
class EntRespuestasEncuestas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_respuestas_encuestas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pregunta', 'txt_valor'], 'required'],
            [['id_pregunta', 'id_usuario'], 'integer'],
            [['txt_valor', 'txt_nombre_usuario'], 'string', 'max' => 200],
            [['id_pregunta'], 'exist', 'skipOnError' => true, 'targetClass' => EntPreguntasEncuestas::className(), 'targetAttribute' => ['id_pregunta' => 'id_pregunta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_respuesta' => 'Id Respuesta',
            'id_pregunta' => 'Id Pregunta',
            'id_usuario' => 'Id Usuario',
            'txt_valor' => 'Txt Valor',
            'txt_nombre_usuario' => 'Txt Nombre Usuario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPregunta()
    {
        return $this->hasOne(EntPreguntasEncuestas::className(), ['id_pregunta' => 'id_pregunta']);
    }
}
