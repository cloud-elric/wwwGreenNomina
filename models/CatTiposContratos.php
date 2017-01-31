<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_tipos_contratos".
 *
 * @property string $id_tipo_contrato
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $b_habilitado
 *
 * @property EntEmpleados[] $entEmpleados
 * @property WrkPagosEmpleados[] $wrkPagosEmpleados
 */
class CatTiposContratos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_tipos_contratos';
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
            'id_tipo_contrato' => 'Id Tipo Contrato',
            'txt_nombre' => 'Txt Nombre',
            'txt_descripcion' => 'Txt Descripcion',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntEmpleados()
    {
        return $this->hasMany(EntEmpleados::className(), ['id_tipo_contrato' => 'id_tipo_contrato']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkPagosEmpleados()
    {
        return $this->hasMany(WrkPagosEmpleados::className(), ['id_tipo_contrato' => 'id_tipo_contrato']);
    }
}
