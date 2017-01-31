<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_ponencia_ponente".
 *
 * @property string $id_ponencia
 * @property string $id_ponente
 *
 * @property EntPonencias $idPonencia
 * @property EntPonentes $idPonente
 */
class RelPonenciaPonente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_ponencia_ponente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ponencia', 'id_ponente'], 'required'],
            [['id_ponencia', 'id_ponente'], 'integer'],
            [['id_ponencia'], 'exist', 'skipOnError' => true, 'targetClass' => EntPonencias::className(), 'targetAttribute' => ['id_ponencia' => 'id_ponencia']],
            [['id_ponente'], 'exist', 'skipOnError' => true, 'targetClass' => EntPonentes::className(), 'targetAttribute' => ['id_ponente' => 'id_ponente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ponencia' => 'Id Ponencia',
            'id_ponente' => 'Id Ponente',
        ];
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
    public function getIdPonente()
    {
        return $this->hasOne(EntPonentes::className(), ['id_ponente' => 'id_ponente']);
    }
}
