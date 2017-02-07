<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
    
		<div class="row">
 	    <div class="col-md-4 col-md-offset-4">	
			<span class="glyphicon glyphicon-user" style="font-size: 200px;"></span>
		</div>
		</div>
	
		<?php $form3 = ActiveForm::begin([ 
	    	'action' => Url::base().'/site/empleado-quincena',	
	    ]); ?>
		<div>
			<label>Usuario:</label>
			<input type="text" name="usu" style="width: 100%">
		
			<label>Password:</label>
			<input type="password" name="pass" style="width: 100%">
		</div>
		<div>	
			<input type="submit" class="btn btn_primary" style="width: 100%">
		</div>
		<?php ActiveForm::end(); ?>
	</div>
</div>	