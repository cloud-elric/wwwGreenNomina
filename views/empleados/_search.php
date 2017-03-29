<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CatSucursales;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleadosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-empleados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <div class="row">
		<div class="col-md-6">
		    <?= $form->field($model, 'txt_nombre') ?>
		
		    <?= $form->field($model, 'id_sucursal')->dropDownList(ArrayHelper::map(CatSucursales::find()->where('b_habilitado=1')->all(), 'id_sucursal', 'txt_nombre'), ['prompt'=>'Seleccionar sucursal'])?>

			<?php // $form->field($model, 'id_tipo_contrato') ?>
			
			<?php // $form->field($model, 'id_nomina') ?>
			
			<?php // echo $form->field($model, 'txt_observaciones') ?>
		</div>
		
		<div class="col-md-6">    
		    <?= $form->field($model, 'txt_rfc') ?>
		
		    <?php // echo $form->field($model, 'num_empleado') ?>
		
		    <?= $form->field($model, 'num_seguro_social') ?>
		
		    <?php // echo $form->field($model, 'fch_alta') ?>
		
		    <?php // echo $form->field($model, 'fch_baja') ?>
		
		    <?php // echo $form->field($model, 'b_habilitado') ?>
		</div>

		<div class="col-md-12 text-center">
		    <div class="form-group">
		        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
		        <?= Html::resetButton('Resetear', ['class' => 'btn btn-default']) ?>
		    </div>
		</div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
