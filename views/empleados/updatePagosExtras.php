<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = 'Actualizar pago extra: ' . $extra->txt_concepto;
$this->params['breadcrumbs'][] = ['label' => $extra->txt_concepto, 'url' => ['view-pago-extra', 'id' => $extra->id_pago_extra]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ent-empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
     <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($extra, 'txt_concepto')->textInput(['maxlength' => true]) ?>

    	<?= $form->field($extra, 'num_monto')->textInput(['maxlength' => true]) ?>
    	
        <?= Html::submitButton('Actualizar') ?>

    <?php ActiveForm::end(); ?>

</div>
