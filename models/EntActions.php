<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_actions".
 *
 * @property string $id_action
 * @property string $txt_nombre
 * @property string $txt_descripcion
 */
class EntActions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_actions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre'], 'required'],
            [['txt_nombre', 'txt_descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_action' => 'Id Action',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
        ];
    }
}
