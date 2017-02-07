<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "view_pagos".
 *
 * @property string $fch_pago
 */
class ViewPagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'view_pagos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fch_pago'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fch_pago' => 'Fch Pago',
        ];
    }
}
