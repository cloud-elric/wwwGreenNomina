<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_empleado_completo".
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
 * @property string $txt_telefono_contacto
 * @property string $txt_mail_contacto
 * @property string $id_dato_bancario
 * @property string $dba_nombre
 * @property string $txt_numero_cuenta
 * @property string $txt_clabe
 * @property string $decc_id_nomina
 * @property string $decc_txt_concepto
 * @property string $pagos_monto
 * @property string $pex_id_nomina
 * @property string $pex_txt_concepto
 * @property integer $extra_monto
 * @property string $pem_id_banco
 * @property string $pem_id_nomina
 * @property string $pem_id_sucursal
 * @property string $pem_tipo_dato
 * @property string $fch_pago
 */
class ViewEmpleadoCompleto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_empleado_completo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empleado', 'id_sucursal', 'id_tipo_contrato', 'id_nomina', 'num_empleado', 'b_habilitado', 'id_dato_bancario', 'dba_nombre', 'decc_id_nomina', 'pagos_monto', 'pex_id_nomina', 'extra_monto', 'pem_id_banco', 'pem_id_nomina', 'pem_id_sucursal', 'pem_tipo_dato'], 'integer'],
            [['txt_nombre'], 'required'],
            [['txt_observaciones', 'txt_numero_cuenta', 'txt_clabe'], 'string'],
            [['fch_alta', 'fch_baja', 'fch_pago'], 'safe'],
            [['txt_nombre', 'txt_telefono_contacto', 'txt_mail_contacto'], 'string', 'max' => 100],
            [['txt_rfc'], 'string', 'max' => 13],
            [['num_seguro_social'], 'string', 'max' => 20],
            [['decc_txt_concepto', 'pex_txt_concepto'], 'string', 'max' => 200],
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
            'txt_nombre' => 'Txt Nombre',
            'txt_observaciones' => 'Txt Observaciones',
            'txt_rfc' => 'Txt Rfc',
            'num_empleado' => 'Num Empleado',
            'num_seguro_social' => 'Num Seguro Social',
            'fch_alta' => 'Fch Alta',
            'fch_baja' => 'Fch Baja',
            'b_habilitado' => 'B Habilitado',
            'txt_telefono_contacto' => 'Txt Telefono Contacto',
            'txt_mail_contacto' => 'Txt Mail Contacto',
            'id_dato_bancario' => 'Id Dato Bancario',
            'dba_nombre' => 'Dba Nombre',
            'txt_numero_cuenta' => 'Txt Numero Cuenta',
            'txt_clabe' => 'Txt Clabe',
            'decc_id_nomina' => 'Decc Id Nomina',
            'decc_txt_concepto' => 'Decc Txt Concepto',
            'pagos_monto' => 'Pagos Monto',
            'pex_id_nomina' => 'Pex Id Nomina',
            'pex_txt_concepto' => 'Pex Txt Concepto',
            'extra_monto' => 'Extra Monto',
            'pem_id_banco' => 'Pem Id Banco',
            'pem_id_nomina' => 'Pem Id Nomina',
            'pem_id_sucursal' => 'Pem Id Sucursal',
            'pem_tipo_dato' => 'Pem Tipo Dato',
            'fch_pago' => 'Fch Pago',
        ];
    }
}
