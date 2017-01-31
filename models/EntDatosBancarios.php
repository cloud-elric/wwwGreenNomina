<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_datos_bancarios".
 *
 * @property string $id_dato_bancario
 * @property string $id_banco
 * @property string $id_empleado
 * @property string $txt_numero_cuenta
 * @property string $txt_clabe
 * @property string $b_habilitado
 *
 * @property CatBancos $idBanco
 * @property EntEmpleados $idEmpleado
 */
class EntDatosBancarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_datos_bancarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_banco', 'id_empleado', 'b_habilitado'], 'integer'],
            [['id_empleado'], 'required'],
            [['txt_numero_cuenta', 'txt_clabe'], 'string'],
            [['id_banco'], 'exist', 'skipOnError' => true, 'targetClass' => CatBancos::className(), 'targetAttribute' => ['id_banco' => 'id_banco']],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => EntEmpleados::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dato_bancario' => 'Id Dato Bancario',
            'id_banco' => 'Id Banco',
            'id_empleado' => 'Id Empleado',
            'txt_numero_cuenta' => 'Txt Numero Cuenta',
            'txt_clabe' => 'Txt Clabe',
            'b_habilitado' => 'B Habilitado',
        ];
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
    public function getIdEmpleado()
    {
        return $this->hasOne(EntEmpleados::className(), ['id_empleado' => 'id_empleado']);
    }
}
