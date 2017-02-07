<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CatSucursales;
use app\models\Utils;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = $model->txt_nombre;
$this->params ['breadcrumbs'] [] = [ 
		'label' => 'Empleados',
		'url' => [ 
				'index' 
		] 
];
$this->params ['breadcrumbs'] [] = $this->title;
?>
<div class="ent-empleados-view">

	<p class="text-right">
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_empleado], ['class' => 'btn btn-primary'])?>
        <?=Html::a ( 'Dar de baja', [ 'delete','id' => $model->id_empleado ], [ 'class' => 'btn btn-danger','data' => [ 'confirm' => 'Estas seguro de que quieres eleminar este elemento?','method' => 'post' ] ] )?>
    </p>
	<div class="row">
		<div class="col-md-12">

			<div class="panel panel-info">
				<div class="panel-heading">
					<h2><?= Html::encode($this->title) ?></h2>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong># empleado:</strong>
							</div>
							<div class="col-md-6"><?=$model->num_empleado?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>RFC:</strong>
							</div>
							<div class="col-md-6"><?=$model->txt_rfc?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>NSS:</strong>
							</div>
							<div class="col-md-6"><?=$model->num_seguro_social?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Sucursal:</strong>
							</div>
							<div class="col-md-6"><?=$model->idSucursal->txt_nombre?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Tipo de contrato:</strong>
							</div>
							<div class="col-md-6"><?=$model->idTipoContrato->txt_nombre?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Nomina:</strong>
							</div>
							<div class="col-md-6"><?=$model->idNomina->txt_nombre ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Banco:</strong>
							</div>
							<div class="col-md-6"><?=$model->entDatosBancarios->idBanco->txt_nombre?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Cuenta:</strong>
							</div>
							<div class="col-md-6"><?=$model->entDatosBancarios->txt_numero_cuenta?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Clabe:</strong>
							</div>
							<div class="col-md-6"><?=$model->entDatosBancarios->txt_clabe?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Usuario:</strong>
							</div>
							<div class="col-md-6"><?=$model->txt_usuario?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Password:</strong>
							</div>
							<div class="col-md-6"><?=$model->txt_password?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Fecha alta:</strong>
							</div>
							<?php  $model->fch_alta = Utils::changeFormatDate($model->fch_alta)?>
							<div class="col-md-6"><?=$model->fch_alta?></div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Telefono:</strong>
							</div>
							<div class="col-md-6"><?=$model->entEmpleadosContactos->txt_telefono_contacto ?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Email:</strong>
							</div>
							<div class="col-md-6"><?=$model->entEmpleadosContactos->txt_mail_contacto ?></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Observaciones:</strong>
							</div>
							<div class="col-md-6"><?=$model->txt_observaciones?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
	<div class="col-md-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3>Historial de pagos</h3>
			</div>
			<div class="panel-body">
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
				
			</div>
		</div>
	</div>
	</div>
</div>
