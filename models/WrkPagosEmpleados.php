<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_pagos_empleados".
 *
 * @property string $id_pago_empleado
 * @property string $id_empleado
 * @property string $id_banco
 * @property string $id_nomina
 * @property string $id_sucursal
 * @property string $id_tipo_contrato
 * @property string $fch_pago
 *
 * @property EntEmpleados $idEmpleado
 * @property CatBancos $idBanco
 * @property CatNominas $idNomina
 * @property CatSucursales $idSucursal
 * @property CatTiposContratos $idTipoContrato
 */
class WrkPagosEmpleados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wrk_pagos_empleados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'id_banco', 'id_nomina', 'id_sucursal', 'id_tipo_contrato'], 'required'],
            [['id_empleado', 'id_banco', 'id_nomina', 'id_sucursal', 'id_tipo_contrato'], 'integer'],
            [['fch_pago'], 'safe'],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => EntEmpleados::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
            [['id_banco'], 'exist', 'skipOnError' => true, 'targetClass' => CatBancos::className(), 'targetAttribute' => ['id_banco' => 'id_banco']],
            [['id_nomina'], 'exist', 'skipOnError' => true, 'targetClass' => CatNominas::className(), 'targetAttribute' => ['id_nomina' => 'id_nomina']],
            [['id_sucursal'], 'exist', 'skipOnError' => true, 'targetClass' => CatSucursales::className(), 'targetAttribute' => ['id_sucursal' => 'id_sucursal']],
            [['id_tipo_contrato'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposContratos::className(), 'targetAttribute' => ['id_tipo_contrato' => 'id_tipo_contrato']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pago_empleado' => 'Id Pago Empleado',
            'id_empleado' => 'Id Empleado',
            'id_banco' => 'Id Banco',
            'id_nomina' => 'Id Nomina',
            'id_sucursal' => 'Id Sucursal',
            'id_tipo_contrato' => 'Id Tipo Contrato',
            'fch_pago' => 'Fch Pago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(EntEmpleados::className(), ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBanco()
    {
        return $this->hasOne(CatBancos::className(), ['id_banco' => 'id_banco']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNomina()
    {
        return $this->hasOne(CatNominas::className(), ['id_nomina' => 'id_nomina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSucursal()
    {
        return $this->hasOne(CatSucursales::className(), ['id_sucursal' => 'id_sucursal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoContrato()
    {
        return $this->hasOne(CatTiposContratos::className(), ['id_tipo_contrato' => 'id_tipo_contrato']);
    }
}
