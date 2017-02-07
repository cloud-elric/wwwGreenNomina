<?php
use yii\grid\GridView;
use yii\helpers\Html;
use app\models\Utils;

$this->title = 'Pagos';
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \yii\widgets\Pjax::begin(); ?>
    
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
        			'id' => $data->id_empleado
        		]);
        	}
        ],
    ]
]); 

\yii\widgets\Pjax::end ();
?>
