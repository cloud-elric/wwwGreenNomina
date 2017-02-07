<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_pagos_extras".
 *
 * @property string $id_pago_extra
 * @property string $id_empleado
 * @property string $id_nomina
 * @property string $txt_concepto
 * @property integer $num_monto
 *
 * @property WrkPagosEmpleados $idNomina
 * @property EntEmpleados $idEmpleado
 */
class WrkPagosExtras extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wrk_pagos_extras';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'id_nomina', 'txt_concepto', 'num_monto'], 'required'],
            [['id_empleado', 'id_nomina', 'num_monto'], 'integer'],
            [['txt_concepto'], 'string', 'max' => 200],
            [['id_nomina'], 'exist', 'skipOnError' => true, 'targetClass' => WrkPagosEmpleados::className(), 'targetAttribute' => ['id_nomina' => 'id_pago_empleado']],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => EntEmpleados::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pago_extra' => 'Id Pago Extra',
            'id_empleado' => 'Id Empleado',
            'id_nomina' => 'Nomina',
            'txt_concepto' => 'Concepto',
            'num_monto' => 'Monto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNomina()
    {
        return $this->hasOne(WrkPagosEmpleados::className(), ['id_pago_empleado' => 'id_nomina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(EntEmpleados::className(), ['id_empleado' => 'id_empleado']);
    }
}
