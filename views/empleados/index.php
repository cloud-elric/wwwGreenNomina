<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CatSucursales;
use app\models\CatTiposContratos;
use app\models\CatNominas;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntEmpleadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Empleado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php \yii\widgets\Pjax::begin(); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
        	[
        		'attribute' => 'txt_nombre',
        		'format' => 'raw',
        		'value' => function($data){
        			return Html::a($data->txt_nombre,[
        				'empleados/view',
        				'id' => $data->id_empleado
        			]);
        		}
        	],
			[
            	'attribute' => 'id_sucursal',
				'format' => 'raw',
				'value'	=> function($data){
	    			$sucursal = CatSucursales::find()->where(['id_sucursal'=>$data->id_sucursal])->one();
	    			return $sucursal->txt_nombre;
    			}
			],
// 			[
// 				'attribute' => 'id_tipo_contrato',
// 				'format' => 'raw',
// 				'value'	=> function($data){
// 					$contrato = CatTiposContratos::find()->where(['id_tipo_contrato'=>$data->id_tipo_contrato])->one();
// 					return $contrato->txt_nombre;
// 				}
// 			],
// 			[
// 				'attribute' => 'id_nomina',
// 				'format' => 'raw',
// 				'value'	=> function($data){
// 					$nomina = CatNominas::find()->where(['id_nomina'=>$data->id_nomina])->one();
// 					return $nomina->txt_nombre;
// 				}
// 			],
//             'txt_observaciones:ntext',
            'txt_rfc',
            'num_empleado',
//             'num_seguro_social',
//             'fch_alta',
//             'fch_baja',
            // 'b_habilitado',

            [
            	'class' => 'yii\grid\ActionColumn',
            	'template' => '{view} {update} {delete} {pagos}',
				'buttons' => [
					'pagos' =>  function ($url, $model) {
			            		$url = Url::base();
						return Html::a('<span class="glyphicon glyphicon-pencil"></span>',
        					$url . '/empleados/pagos-extras'.
							'?id=' . $model->id_empleado
            			);
            		}
				]
			], 
        ],
    ]); 
    
    \yii\widgets\Pjax::end ();
    ?>
</div>
