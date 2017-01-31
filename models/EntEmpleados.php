<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_empleados".
 *
 * @property string $id_empleado
 * @property string $id_sucursal
 * @property string $id_tipo_contrato
 * @property string $id_nomina
 * @property string $txt_nombre
 * @property string $txt_observaciones
 * @property string $txt_rfc
 * @property string $num_empleado
 * @property string $num_seguro_social
 * @property string $fch_alta
 * @property string $fch_baja
 * @property string $b_habilitado
 *
 * @property EntDatosBancarios[] $entDatosBancarios
 * @property CatNominas $idNomina
 * @property CatSucursales $idSucursal
 * @property CatTiposContratos $idTipoContrato
 * @property EntEmpleadosContactos $entEmpleadosContactos
 * @property WrkPagosEmpleados[] $wrkPagosEmpleados
 */
class EntEmpleados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_empleados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sucursal', 'id_tipo_contrato', 'id_nomina', 'num_empleado', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'required'],
            [['txt_observaciones'], 'string'],
            [['fch_alta', 'fch_baja'], 'safe'],
            [['txt_nombre'], 'string', 'max' => 100],
            [['txt_rfc'], 'string', 'max' => 13],
            [['num_seguro_social'], 'string', 'max' => 20],
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
            'id_empleado' => 'Id Empleado',
            'id_sucursal' => 'Id Sucursal',
            'id_tipo_contrato' => 'Id Tipo Contrato',
            'id_nomina' => 'Id Nomina',
            'txt_nombre' => 'Nombre',
            'txt_observaciones' => 'Observaciones',
            'txt_rfc' => 'Rfc',
            'num_empleado' => 'Num Empleado',
            'num_seguro_social' => 'Num Seguro Social',
            'fch_alta' => 'Fecha Alta',
            'fch_baja' => 'Fecha Baja',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntDatosBancarios()
    {
        return $this->hasMany(EntDatosBancarios::className(), ['id_empleado' => 'id_empleado']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEntEmpleadosContactos()
    {
        return $this->hasOne(EntEmpleadosContactos::className(), ['id_empleado' => 'id_empleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkPagosEmpleados()
    {
        return $this->hasMany(WrkPagosEmpleados::className(), ['id_empleado' => 'id_empleado']);
    }
}
