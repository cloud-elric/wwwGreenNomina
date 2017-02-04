<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>

<?php \yii\widgets\Pjax::begin(); ?>
    
<?= GridView::widget([
	'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
    	['class' => 'yii\grid\SerialColumn'],
        [
        	'attribute' => 'fch_pago',
        	'format' => 'raw',
        	'value' => function($data){
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
