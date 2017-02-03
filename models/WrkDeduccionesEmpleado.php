<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_deducciones_empleado".
 *
 * @property string $id_deduccion_empleado
 * @property string $id_empleado
 * @property string $id_nomina
 * @property string $txt_concepto
 * @property string $num_monto
 *
 * @property EntEmpleados $idEmpleado
 * @property CatNominas $idNomina
 */
class WrkDeduccionesEmpleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wrk_deducciones_empleado';
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
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => EntEmpleados::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
            [['id_nomina'], 'exist', 'skipOnError' => true, 'targetClass' => CatNominas::className(), 'targetAttribute' => ['id_nomina' => 'id_nomina']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_deduccion_empleado' => 'Id Deduccion Empleado',
            'id_empleado' => 'Id Empleado',
            'id_nomina' => 'Id Nomina',
            'txt_concepto' => 'Txt Concepto',
            'num_monto' => 'Num Monto',
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
    public function getIdNomina()
    {
        return $this->hasOne(CatNominas::className(), ['id_nomina' => 'id_nomina']);
    }
}