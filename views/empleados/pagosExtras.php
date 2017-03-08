<?php
use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Utils;

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \yii\widgets\Pjax::begin(); ?>

<div class="panel panel-default">
  <div class="panel-heading"><h1><?= Html::encode($empleado->txt_nombre) ?></h1></div>
  <div class="panel-body">
<?= GridView::widget([
	'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
    	['class' => 'yii\grid\SerialColumn'],
        [
        	'attribute' => 'fecha de pago',
        	'format' => 'raw',
        	'value' => function($data){
        		$data->fch_pago = Utils::changeFormatDate($data->fch_pago);
        		return Html::a($data->fch_pago,[
        			'empleados/agregar-pago',
        			'id' => $data->id_empleado,
        			'idPago' => $data->id_pago_empleado
        		]);
        	}
        ],
    ]
]); 
\yii\widgets\Pjax::end ();
?>
</div></div>