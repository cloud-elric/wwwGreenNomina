<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CatSucursales;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = $model->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_empleado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_empleado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de que quieres eleminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        	[	
        		'attribute' => 'id_sucursal',
        		'value' => $model->idSucursal->txt_nombre,	
    		],
        	[
        		'attribute' => 'id_tipo_contrato',
        		'value' => $model->idTipoContrato->txt_nombre
    		],
            [
            	'attribute' => 'id_nomina',
            	'value' => $model->idNomina->txt_nombre
		    ],
            'txt_nombre',
            'txt_observaciones:ntext',
            'txt_rfc',
            'num_empleado',
            'num_seguro_social',
            'fch_alta',
            'fch_baja',
//             'b_habilitado',
        ],
    ])?>

</div>
