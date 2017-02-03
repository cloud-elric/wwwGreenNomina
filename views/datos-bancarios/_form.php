<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CatBancos;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\EntDatosBancarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ent-datos-bancarios-form">

    <?php $form2 = ActiveForm::begin([ 
		'options' => [ 
				'enctype' => 'multipart/form-data' 
		],
    	'action' => Url::base().'/empleados/create',	
    ]); ?>

    <?= $form2->field($model2, 'id_banco')->dropDownList(ArrayHelper::map(CatBancos::find()->asArray()->all(), 'id_banco', 'txt_nombre'), ['prompt' => 'Seleccionar banco']) ?>

    <?= $form2->field($model2, 'txt_numero_cuenta')->textarea(['rows' => 6]) ?>

    <?= $form2->field($model2, 'txt_clabe')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model2->isNewRecord ? 'Create' : 'Update', ['id' => 'btn_submit_banco', 'class' => $model2->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'display:none']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
