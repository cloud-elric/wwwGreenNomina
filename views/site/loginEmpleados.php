<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="row">
	<div class="col-md-4 col-md-offset-4">
    
		<?php
		
$form3 = ActiveForm::begin ( [ 
				'action' => Url::base () . '/site/empleado-quincena' 
		] );
		?>
	    <div
			class="form-group">
			<label class="control-label" for="usu">Usuario</label>
			<input type="text" name="usu" id="usu" class="form-control">

		</div>
		
		 <div
			class="form-group">
			<label class="control-label" for="pass">Contraseña</label>
			<input type="text" name="pass" id="pass" class="form-control">

		</div>

		<div>
			<input type="submit" class="btn btn_primary" style="width: 100%">
		</div>
		<?php ActiveForm::end(); ?>
	</div>
</div>
