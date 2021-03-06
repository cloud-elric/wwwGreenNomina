<?php
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\WrkPagosEmpleados;
use yii\helpers\Url;
use app\models\Utils;

$this->title = 'Depositos';
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Pagos', 'url' => ['pagos-extras?id='.$extras->id_empleado]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
  <div class="panel-heading"><h1><?= Html::encode($empleadoV->txt_nombre) ?></h1></div>
  <div class="panel-body">
<?php $form = ActiveForm::begin([]); ?>
    
    <?= $form->field($extras, 'id_empleado')->hiddenInput(['value' => $extras->id_empleado])->label(false)?>
    
    <?php
    $fechas = WrkPagosEmpleados::find()->where(['id_empleado'=>$extras->id_empleado])->all();
    	//var_dump($fechas);exit();
    	$fch_correcta = array();
    	$i=0;
    	foreach($fechas as $fch){
    		$fch->fch_pago = Utils::changeFormatDate($fch->fch_pago);
    		//$fch_correcta[$fch->id_pago_empleado] = $fch->fch_pago;
    		
    		$fch_correcta[$i] = 
    			['id_pago_empleado' => $fch->id_pago_empleado, 'fch_pago' => $fch->fch_pago];
    		$i++;
    	}
//     	var_dump($fch_correcta);
//     	var_dump($arreglo);exit();
    ?>
    <?=  $form->field($extras, 'id_nomina')->dropDownList(ArrayHelper::map($fch_correcta, 'id_pago_empleado', 'fch_pago'))->label('Fecha $') ?>
    
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
    	'num_monto',
    	[
    		'class' => 'yii\grid\ActionColumn',
    		'buttons' => [
    			'view' => function ($url, $model) {
    			$url = Url::base();
    				return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url."/empleados/view-pago-extra?id=" . $model->id_pago_extra);
    			},
    			'update' => function ($url, $model) {
    				$url = Url::base();
    				return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url."/empleados/update-pago-extra?id=" . $model->id_pago_extra);
    			},
    			'delete' => function ($url, $model) {
    			$url = Url::base();
    			return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url."/empleados/delete-pago-extra?id=" . $model->id_pago_extra);
    			}
    		]
		]
    ]
]); 

\yii\widgets\Pjax::end ();
?>
</div></div>