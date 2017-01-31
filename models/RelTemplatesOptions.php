<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_templates_options".
 *
 * @property integer $id_option
 * @property string $id_template
 * @property string $txt_nombre
 * @property string $txt_valor
 *
 * @property CatTemplatesHtml $idTemplate
 */
class RelTemplatesOptions extends \yii\db\ActiveRecord
{
	public $txt_config;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_templates_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_template', 'txt_nombre', 'txt_config'], 'required'],
            [['id_template'], 'integer'],
            [['txt_valor'], 'string'],
            [['txt_nombre'], 'string', 'max' => 200],
            [['id_template'], 'exist', 'skipOnError' => true, 'targetClass' => CatTemplatesHtml::className(), 'targetAttribute' => ['id_template' => 'id_template_html']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_option' => 'Id Option',
            'id_template' => 'Id Template',
            'txt_nombre' => 'Txt Nombre',
            'txt_valor' => 'Txt Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTemplate()
    {
        return $this->hasOne(CatTemplatesHtml::className(), ['id_template_html' => 'id_template']);
    }
}
