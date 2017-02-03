<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleadosContactos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-empleados-contactos-form">

    <?php $form3 = ActiveForm::begin([ 
		'options' => [ 
				'enctype' => 'multipart/form-data' 
		],
    	'action' => Url::base().'/empleados/create',	
    ]); ?>

    <?= $form3->field($model3, 'txt_telefono_contacto')->textInput(['maxlength' => true]) ?>

    <?= $form3->field($model3, 'txt_mail_contacto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model3->isNewRecord ? 'Create' : 'Update', ['id' => 'btn_submit_contacto', 'class' => $model3->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'display:none']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
