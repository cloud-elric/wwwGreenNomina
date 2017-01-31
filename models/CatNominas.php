<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_nominas".
 *
 * @property string $id_nomina
 * @property string $txt_nombre
 * @property string $txt_descripcion
 * @property string $b_habilitado
 *
 * @property EntEmpleados[] $entEmpleados
 * @property WrkPagosEmpleados[] $wrkPagosEmpleados
 */
class CatNominas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_nominas';
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
            'id_nomina' => 'Id Nomina',
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
        return $this->hasMany(EntEmpleados::className(), ['id_nomina' => 'id_nomina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWrkPagosEmpleados()
    {
        return $this->hasMany(WrkPagosEmpleados::className(), ['id_nomina' => 'id_nomina']);
    }
}
