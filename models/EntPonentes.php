<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_ponentes".
 *
 * @property string $id_ponente
 * @property string $id_convencion
 * @property string $txt_nombre
 * @property string $txt_apellido_p
 * @property string $txt_apellido_m
 * @property string $txt_job
 * @property string $txt_descripcion
 * @property string $txt_nombre_archivo
 * @property string $b_vip
 * @property string $b_habilitado
 *
 * @property EntPonencias[] $entPonencias
 * @property EntEventos $idEvento
 * @property RelConvencionPonente[] $relConvencionPonentes
 * @property EntConvenciones[] $idConvencions
 */
class EntPonentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_ponentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_convencion'], 'required'],
            [['id_convencion', 'b_vip', 'b_habilitado'], 'integer'],
            [['txt_nombre', 'txt_apellido_p', 'txt_apellido_m', 'txt_job'], 'string', 'max' => 50],
            [['txt_descripcion', 'txt_nombre_archivo'], 'string', 'max' => 500],
            [['id_convencion'], 'exist', 'skipOnError' => true, 'targetClass' => EntEventos::className(), 'targetAttribute' => ['id_convencion' => 'id_convencion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ponente' => 'Id Ponente',
            'id_evento' => 'Id Evento',
            'txt_nombre' => 'Nombre',
            'txt_apellido_p' => 'Apellido Paterno',
            'txt_apellido_m' => 'Apellido Materno',
            'txt_job' => 'Trabajo',
            'txt_descripcion' => 'Descripcion',
            'txt_nombre_archivo' => 'Nombre Archivo',
            'b_vip' => 'B Vip',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntPonencias()
    {
        return $this->hasMany(EntPonencias::className(), ['id_ponente' => 'id_ponente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(EntEventos::className(), ['id_convencion' => 'id_convencion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelConvencionPonentes()
    {
        return $this->hasMany(RelConvencionPonente::className(), ['id_ponente' => 'id_ponente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdConvencions()
    {
        return $this->hasMany(EntConvenciones::className(), ['id_convencion' => 'id_evento'])->viaTable('rel_convencion_ponente', ['id_ponente' => 'id_evento']);
    }
}
