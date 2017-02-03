<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleadosContactoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-empleados-contactos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_empleado') ?>

    <?= $form->field($model, 'txt_telefono_contacto') ?>

    <?= $form->field($model, 'txt_mail_contacto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
