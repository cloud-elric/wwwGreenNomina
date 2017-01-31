<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_sucursales".
 *
 * @property string $id_sucursal
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $b_habilitado
 *
 * @property EntEmpleados[] $entEmpleados
 * @property WrkPagosEmpleados[] $wrkPagosEmpleados
 */
class CatSucursales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_sucursales';
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
            'id_sucursal' => 'Id Sucursal',
            'txt_nombre' => 'Nombre',
            'txt_descripcion' => 'Descripcion',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntEmpleados()
    {
        return $this->hasMany(EntEmpleados::className(), ['id_sucursal' => 'id_sucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkPagosEmpleados()
    {
        return $this->hasMany(WrkPagosEmpleados::className(), ['id_sucursal' => 'id_sucursal']);
    }
}
