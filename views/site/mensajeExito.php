<?php
use yii\web\UrlManager;
use yii\helpers\Html;
?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel">
				<div class="panel-body">
					<p>Se ha enviado un correo electronico a la dirección proporcionada en el encontrara su contraseña.</p>
					
					<div class="col-md-12">
						<?=Html::a('Login', ['site/login-empleados'], ['class'=>'btn btn-primary']) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>