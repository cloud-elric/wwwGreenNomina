<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CatSucursales;
use yii\helpers\ArrayHelper;
use app\models\CatTiposContratos;
use app\models\CatNominas;
use yii\web\View;
use app\models\CatBancos;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-empleados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sucursal')->dropDownList(ArrayHelper::map(CatSucursales::find()->asArray()->all(), 'id_sucursal', 'txt_nombre'), ['prompt' => 'Seleccionar sucursal'])?>

    <?= $form->field($model, 'id_tipo_contrato')->dropDownList(ArrayHelper::map(CatTiposContratos::find()->asArray()->all(), 'id_tipo_contrato', 'txt_nombre'), ['prompt' => 'Seleccionar contrato'])?>

    <?= $form->field($model, 'id_nomina')->dropDownList(ArrayHelper::map(CatNominas::find()->asArray()->all(), 'id_nomina', 'txt_nombre'), ['prompt' => 'Seleccionar nomina'])?>

    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'txt_rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_empleado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'num_seguro_social')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fch_alta')->textInput() ?>

    <?= $form->field($model2, 'id_banco')->dropDownList(ArrayHelper::map(CatBancos::find()->asArray()->all(), 'id_banco', 'txt_nombre'), ['prompt' => 'Seleccionar banco']) ?>

    <?= $form->field($model2, 'txt_numero_cuenta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model2, 'txt_clabe')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model3, 'txt_telefono_contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model3, 'txt_mail_contacto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['id' => 'btn_submit_empleado', 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

