<?php use yii\grid\GridView;
use app\models\Utils;
use yii\helpers\Html;




\yii\widgets\Pjax::begin(); ?>
    
<?= GridView::widget([
	'dataProvider' => $dataProvider,
    //'filterModel' => $searchModel,
    'columns' => [
    	['class' => 'yii\grid\SerialColumn'],
        [
        	'attribute' => 'fecha de $',
        	'format' => 'raw',
        	'value' => function($data){
        		$data->fch_pago = Utils::changeFormatDate($data->fch_pago);
        		return Html::a($data->fch_pago,[
        			'empleados/pagos-realizados',
        			'fch' => $data->fch_pago
        		]);
        	}
        ],
    ]
]); 

\yii\widgets\Pjax::end ();
?>