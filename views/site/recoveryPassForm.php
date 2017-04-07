<?php
use yii\widgets\ActiveForm;
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		
			<div class="panel">
				<div class="panel-heading">
				<h4>
				 Para recuperar tu contraseña ingresa tu email que RH tiene dado de alta.
				</h4>
				</div>
				<div class="panel-body">
					
					<?php
					
					$form = ActiveForm::begin ( [ 
							'id' => 'form-contact-us' 
					] );
					?>
			

				<div class="form-group">
     				 <?=$form->field($recoveryPass, 'email')->textInput(['class'=>'form-control'])->label('Email')?>
      			</div>
				<div class="form-group">
					<button id="js-submit-contact-us" type="submit" class="btn btn-primary js-send-contact-us ladda-button" data-style='zoom-in'><span class="ladda-label">Recuperar contraseña</span></button>
				</div>
				  <?php ActiveForm::end(); ?>
				
				</div>
			</div>
		</div>
	</div>
</div>
