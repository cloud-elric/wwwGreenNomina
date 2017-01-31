<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_comunicados".
 *
 * @property string $id_comunicado
 * @property string $id_template
 * @property string $id_evento
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $b_habilitado
 *
 * @property EntEventos $idEvento
 * @property CatTemplatesHtml $idTemplate
 */
class CatComunicados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_comunicados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_template', 'id_evento', 'txt_nombre'], 'required'],
            [['id_template', 'id_evento', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 200],
            [['txt_descripcion'], 'string', 'max' => 500],
            [['id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => EntEventos::className(), 'targetAttribute' => ['id_evento' => 'id_convencion']],
            [['id_template'], 'exist', 'skipOnError' => true, 'targetClass' => CatTemplatesHtml::className(), 'targetAttribute' => ['id_template' => 'id_template_html']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_comunicado' => 'Id Comunicado',
            'id_template' => 'Template html',
            'id_evento' => 'Id Evento',
            'txt_nombre' => 'Nombre',
            'txt_descripcion' => 'Descripcion',
            'b_habilitado' => 'Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(EntEventos::className(), ['id_evento' => 'id_convencion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTemplate()
    {
        return $this->hasOne(CatTemplatesHtml::className(), ['id_template_html' => 'id_template']);
    }
}
