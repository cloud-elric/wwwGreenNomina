<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_bancos".
 *
 * @property string $id_banco
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $b_habilitado
 *
 * @property EntDatosBancarios[] $entDatosBancarios
 * @property WrkPagosEmpleados[] $wrkPagosEmpleados
 */
class CatBancos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_bancos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre'], 'required'],
            [['b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 100],
            [['txt_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_banco' => 'Id Banco',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosBancarios()
    {
        return $this->hasMany(EntDatosBancarios::className(), ['id_banco' => 'id_banco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkPagosEmpleados()
    {
        return $this->hasMany(WrkPagosEmpleados::className(), ['id_banco' => 'id_banco']);
    }
}
