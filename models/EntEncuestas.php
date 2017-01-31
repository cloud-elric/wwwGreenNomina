<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_encuestas".
 *
 * @property string $id_encuesta
 * @property string $id_ponencia
 * @property string $id_convencion
 * @property string $txt_nombre
 * @property string $b_habilitado
 *
 * @property EntConvenciones $idConvencion
 * @property EntPonencias $idPonencia
 * @property EntPreguntasEncuestas[] $entPreguntasEncuestas
 */
class EntEncuestas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_encuestas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ponencia', 'id_convencion'], 'integer'],
            [['txt_nombre', 'b_habilitado'], 'required'],
            [['txt_nombre', 'b_habilitado'], 'string', 'max' => 200],
            [['id_convencion'], 'exist', 'skipOnError' => true, 'targetClass' => EntEventos::className(), 'targetAttribute' => ['id_convencion' => 'id_convencion']],
            [['id_ponencia'], 'exist', 'skipOnError' => true, 'targetClass' => EntPonencias::className(), 'targetAttribute' => ['id_ponencia' => 'id_ponencia']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_encuesta' => 'Id Encuesta',
            'id_ponencia' => 'Id Ponencia',
            'id_convencion' => 'Id Convencion',
            'txt_nombre' => 'Nombre',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdConvencion()
    {
        return $this->hasOne(EntConvenciones::className(), ['id_convencion' => 'id_convencion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPonencia()
    {
        return $this->hasOne(EntPonencias::className(), ['id_ponencia' => 'id_ponencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntPreguntasEncuestas()
    {
        return $this->hasMany(EntPreguntasEncuestas::className(), ['id_encuesta' => 'id_encuesta']);
    }
}
