<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatTiposContratosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cat-tipos-contratos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tipo_contrato') ?>

    <?= $form->field($model, 'txt_nombre') ?>

    <?= $form->field($model, 'txt_descripcion') ?>

    <?= $form->field($model, 'b_habilitado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
