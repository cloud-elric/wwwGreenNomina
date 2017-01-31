<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_empleados_contactos".
 *
 * @property string $id_empleado
 * @property string $txt_telefono_contacto
 * @property string $txt_mail_contacto
 *
 * @property EntEmpleados $idEmpleado
 */
class EntEmpleadosContactos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_empleados_contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_telefono_contacto', 'txt_mail_contacto'], 'string', 'max' => 100],
            [['id_empleado'], 'exist', 'skipOnError' => true, 'targetClass' => EntEmpleados::className(), 'targetAttribute' => ['id_empleado' => 'id_empleado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empleado' => 'Id Empleado',
            'txt_telefono_contacto' => 'Txt Telefono Contacto',
            'txt_mail_contacto' => 'Txt Mail Contacto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpleado()
    {
        return $this->hasOne(EntEmpleados::className(), ['id_empleado' => 'id_empleado']);
    }
}
