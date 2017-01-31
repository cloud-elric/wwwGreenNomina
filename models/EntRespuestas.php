<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_respuestas".
 *
 * @property string $id_respuesta
 * @property string $fch_creacion
 *
 * @property EntRespuestasEncuestas[] $entRespuestasEncuestas
 */
class EntRespuestas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_respuestas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fch_creacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_respuesta' => 'Id Respuesta',
            'fch_creacion' => 'Fch Creacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntRespuestasEncuestas()
    {
        return $this->hasMany(EntRespuestasEncuestas::className(), ['id_respuesta_creacion' => 'id_respuesta']);
    }
}
