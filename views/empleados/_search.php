<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-empleados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_empleado') ?>

    <?= $form->field($model, 'id_sucursal') ?>

    <?= $form->field($model, 'id_tipo_contrato') ?>

    <?= $form->field($model, 'id_nomina') ?>

    <?= $form->field($model, 'txt_nombre') ?>

    <?php // echo $form->field($model, 'txt_observaciones') ?>

    <?php // echo $form->field($model, 'txt_rfc') ?>

    <?php // echo $form->field($model, 'num_empleado') ?>

    <?php // echo $form->field($model, 'num_seguro_social') ?>

    <?php // echo $form->field($model, 'fch_alta') ?>

    <?php // echo $form->field($model, 'fch_baja') ?>

    <?php // echo $form->field($model, 'b_habilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
