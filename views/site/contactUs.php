<?php 
use app\models\ContactUs;
use yii\bootstrap\ActiveForm;

$this->registerJsFile(
		'@web/js/contact-us.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
		);
?>

 <style>
.container-contact-us {
	position: fixed;
	bottom: 0;
}

.modal form {
	margin: 0 auto;
}
</style>
	<div class="col-md-3 col-md-offset-9 container-contact-us">
		<button class="btn btn-default btn-block" data-toggle="modal"
			data-target="#contact-us-modal">Contáctanos</button>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="contact-us-modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Contáctanos</h4>
				</div>
					<?php
					$contact = new ContactUs ();
					$form = ActiveForm::begin ( [ 
							'id' => 'form-contact-us' 
					] );
					?>
				<div class="modal-body">
					<div class="container-fluid">
						<div class="row">
							
							<div class="form-group">
      							<p>Para poder atenderte, verifica antes tu estado bancario, 
      							que tu cuenta no este bloqueada y haz un recuento de tus últimos gastos, 
      							pues a veces sucede que el deposito paso antes de algún retiro en cajero.</p>
      						</div>
							<div class="form-group">
			      				<?=$form->field($contact, 'nombre')->textInput(['class'=>'form-control'])->label('Nombre completo')?>
			     			</div>
							<div class="form-group">
      							<?=$form->field($contact, 'email')->textInput(['class'=>'form-control'])?>
      						</div>
							<div class="form-group">
     				 			<?=$form->field($contact, 'description')->dropDownList(['Mi total no coincide' => 'Mi total no coincide',  'Duda en descuentos' => 'Duda en descuentos','Duda fijos'=>'Duda fijos', 'Duda variables'=>'Duda variables'],['prompt'=>'Seleccionar problema','class'=>'form-control'])->label('¿Tienes un problema?')?>
      						</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="js-submit-contact-us" type="submit" class="btn btn-primary js-send-contact-us ladda-button" data-style='zoom-in'><span class="ladda-label">Contáctanos</span></button>
				</div>
				  <?php ActiveForm::end(); ?>
			</div>
		</div>
	</div>
	
	