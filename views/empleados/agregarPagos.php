<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\WrkPagosEmpleados;
?>

<?php $form = ActiveForm::begin([]); ?>
    
    <?= $form->field($extras, 'id_empleado')->hiddenInput(['value' => $extras->id_empleado])->label(false)?>
     
    <?= $form->field($extras, 'id_nomina')->dropDownList(ArrayHelper::map(WrkPagosEmpleados::find()->where(['id_empleado'=>$extras->id_empleado])->asArray()->all(), 'id_pago_empleado', 'fch_pago'))?>
	
	<?= $form->field($extras, 'txt_concepto')->textInput(['maxlength' => true])?>
	
	<?= $form->field($extras, 'num_monto')->textInput(['maxlength' => true])?>
	
	<?= Html::submitButton('Crear') ?>
	
<?php ActiveForm::end(); ?>


<?php \yii\widgets\Pjax::begin(); ?>
    
<?= GridView::widget([
	'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
    	['class' => 'yii\grid\SerialColumn'],
        'txt_concepto',
    	'num_monto'
    ]
]); 

\yii\widgets\Pjax::end ();
?>
