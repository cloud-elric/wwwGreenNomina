<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_ponencias".
 *
 * @property string $id_ponencia
 * @property string $id_convencion
 * @property string $txt_titulo
 * @property string $txt_actividad
 * @property string $txt_descripcion
 * @property string $txt_notas
 * @property string $txt_lugar
 * @property string $num_cupo
 * @property string $num_dia
 * @property string $num_orden
 * @property string $txt_hora_inicio
 * @property string $txt_duracion
 * @property string $txt_imagen_header
 * @property string $txt_grupo
 * @property string $txt_ico
 * @property string $num_asistentes
 * @property string $b_vip
 * @property string $b_receso
 * @property string $b_habilitado
 *
 * @property EntEventos $idEvento
 */
class EntPonencias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_ponencias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_convencion', 'txt_titulo', 'txt_actividad', 'txt_descripcion', 'txt_notas'], 'required'],
            [['id_convencion', 'num_cupo', 'num_dia', 'num_orden', 'num_asistentes', 'b_vip', 'b_receso', 'b_habilitado'], 'integer'],
            [['txt_titulo', 'txt_actividad'], 'string', 'max' => 200],
            [['txt_descripcion', 'txt_notas'], 'string', 'max' => 700],
            [['txt_lugar', 'txt_hora_inicio', 'txt_duracion', 'txt_imagen_header', 'txt_grupo', 'txt_ico'], 'string', 'max' => 50],
            [['id_convencion'], 'exist', 'skipOnError' => true, 'targetClass' => EntEventos::className(), 'targetAttribute' => ['id_convencion' => 'id_convencion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ponencia' => 'Id ponencia',
            'id_convencion' => 'Id evento',
            'txt_titulo' => 'Titulo',
            'txt_actividad' => 'Actividad',
            'txt_descripcion' => 'Descripcion',
            'txt_notas' => 'Notas',
            'txt_lugar' => 'Lugar',
            'num_cupo' => 'Num cupo',
            'num_dia' => 'Dia',
            'num_orden' => 'Num orden',
            'txt_hora_inicio' => 'Hora inicio',
            'txt_duracion' => 'Duracion',
            'txt_imagen_header' => 'Imagen header',
            'txt_grupo' => 'Grupo',
            'txt_ico' => 'Txt Ico',
            'num_asistentes' => 'Num asistentes',
            'b_vip' => 'Vip',
            'b_receso' => 'Receso',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(EntEventos::className(), ['id_convencion' => 'id_convencion']);
    }
}
