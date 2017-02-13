<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel">
			<div class="panel-body">
				<h1><?= Html::encode($this->title) ?></h1>

    <?php
				
				$form = ActiveForm::begin ( [ 
						'id' => 'login-form',
						// 'options' => [
						// 'class' => 'form-horizontal'
						// ],
						'fieldConfig' => [ ] 
				]
				// 'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
				// 'labelOptions' => [
				// 'class' => 'col-lg-1 control-label'
				// ]
				
				 );
				?>
<div class="row">
					<div class="col-md-12">
        <?= $form->field($model, 'username')->textInput(['placeholder'=>'Usuario'])->label(false)?>
</div>
					<div class="col-md-12">
        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Contraseña'])->label(false)?>

</div>


					<div class="form-group">
						<div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button'])?>
            </div>
					</div>

    <?php ActiveForm::end(); ?>
    </div>
			</div>
		</div>
	</div>
</div>