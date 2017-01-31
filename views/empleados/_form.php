<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sucursal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_contrato')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_nomina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'txt_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_empleado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_seguro_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fch_alta')->textInput() ?>

    <?= $form->field($model, 'fch_baja')->textInput() ?>

    <?= $form->field($model, 'b_habilitado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
