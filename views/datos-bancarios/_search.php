<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ViewEntDatosBancariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-datos-bancarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_dato_bancario') ?>

    <?= $form->field($model, 'id_banco') ?>

    <?= $form->field($model, 'id_empleado') ?>

    <?= $form->field($model, 'txt_numero_cuenta') ?>

    <?= $form->field($model, 'txt_clabe') ?>

    <?php // echo $form->field($model, 'b_habilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
