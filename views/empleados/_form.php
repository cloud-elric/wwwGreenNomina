<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CatSucursales;
use yii\helpers\ArrayHelper;
use app\models\CatTiposContratos;
use app\models\CatNominas;
use yii\web\View;
use app\models\CatBancos;
use app\models\Utils;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sucursal')->dropDownList(ArrayHelper::map(CatSucursales::find()->orderBy('txt_nombre')->asArray()->all(), 'id_sucursal', 'txt_nombre'), ['prompt' => 'Seleccionar sucursal'])?>

    <?= $form->field($model, 'id_tipo_contrato')->dropDownList(ArrayHelper::map(CatTiposContratos::find()->orderBy('txt_nombre')->asArray()->all(), 'id_tipo_contrato', 'txt_nombre'), ['prompt' => 'Seleccionar contrato'])?>

    <?= $form->field($model, 'id_nomina')->dropDownList(ArrayHelper::map(CatNominas::find()->orderBy('txt_nombre')->asArray()->all(), 'id_nomina', 'txt_nombre'), ['prompt' => 'Seleccionar nomina'])?>

    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'txt_rfc')->textInput(['maxlength' => 13]) ?>

    <?= $form->field($model, 'num_empleado')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'num_seguro_social')->textInput(['maxlength' => 30]) ?>
    
	<?php if($model->fch_alta){
		$model->fch_alta = Utils::changeFormatDate($model->fch_alta); 
	}?>
    <?= $form->field($model, 'fch_alta')->textInput() ?>

    <?= $form->field($model2, 'id_banco')->dropDownList(ArrayHelper::map(CatBancos::find()->asArray()->all(), 'id_banco', 'txt_nombre'), ['prompt' => 'Seleccionar banco']) ?>

    <?= $form->field($model2, 'txt_numero_cuenta')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model2, 'txt_clabe')->textInput(['maxlength' => 50]) ?>
    
    <?= $form->field($model3, 'txt_telefono_contacto')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model3, 'txt_mail_contacto')->textInput(['maxlength' => 100]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['id' => 'btn_submit_empleado', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

