<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_templates_html".
 *
 * @property string $id_template_html
 * @property string $id_evento
 * @property string $txt_nombre
 * @property string $txt_content
 * @property string $b_habilitado
 *
 * @property CatComunicados[] $catComunicados
 * @property EntEventos $idEvento
 */
class CatTemplatesHtml extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_templates_html';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_evento', 'txt_nombre', 'txt_content'], 'required'],
            [['id_evento', 'b_habilitado'], 'integer'],
            [['txt_content'], 'string'],
            [['txt_nombre'], 'string', 'max' => 200],
            [['id_evento'], 'exist', 'skipOnError' => true, 'targetClass' => EntEventos::className(), 'targetAttribute' => ['id_evento' => 'id_evento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_template_html' => 'Id Template Html',
            'id_evento' => 'Id Evento',
            'txt_nombre' => 'Txt Nombre',
            'txt_content' => 'Txt Content',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatComunicados()
    {
        return $this->hasMany(CatComunicados::className(), ['id_template' => 'id_template_html']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEvento()
    {
        return $this->hasOne(EntEventos::className(), ['id_evento' => 'id_evento']);
    }
    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelTemplatesOptions()
    {
    	return $this->hasMany(RelTemplatesOptions::className(), ['id_template' => 'id_template_html']);
    }
}
