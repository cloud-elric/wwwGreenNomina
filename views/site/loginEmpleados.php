<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<?php $form3 = ActiveForm::begin([ 
    	'action' => Url::base().'/site/empleado-quincena',	
    ]); ?>

	<label>Usuario:</label>
	<input type="text" name="usu" >
	
	<label>Password:</label>
	<input type="password" name="pass">
	
	<input type="submit">

<?php ActiveForm::end(); ?>
