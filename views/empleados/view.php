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

	<?php if(Yii::$app->user->identity->id_tipo_usuario == 3){?>
		<p class="text-right">
	        <?= Html::a('Actualizar', ['update', 'id' => $model->id_empleado], ['class' => 'btn btn-primary'])?>
	        <?=Html::a ( 'Dar de baja', [ 'delete','id' => $model->id_empleado ], [ 'class' => 'btn btn-danger','data' => [ 'confirm' => 'Estas seguro de que quieres eleminar este elemento?','method' => 'post' ] ] )?>
	    </p>
	<?php }?>    
	    
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
							<div class="col-md-6"><span><?=$model->num_empleado?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>RFC:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->txt_rfc?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>NSS:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->num_seguro_social?></span></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Sucursal:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->idSucursal->txt_nombre?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Tipo ejecutivo:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->idTipoContrato->txt_nombre?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong></strong>
							</div>
							<div class="col-md-6"><span><?=$model->idNomina->txt_nombre ?></span></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Banco:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->entDatosBancarios->idBanco->txt_nombre?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Cuenta:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->entDatosBancarios->txt_numero_cuenta?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Clabe:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->entDatosBancarios->txt_clabe?></span></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Usuario:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->txt_usuario?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Password:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->txt_password?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Fecha alta:</strong>
							</div>
							<?php  $model->fch_alta = Utils::changeFormatDate($model->fch_alta)?>
							<div class="col-md-6"><span><?=$model->fch_alta?></span></div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Telefono:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->entEmpleadosContactos->txt_telefono_contacto ?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Email:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->entEmpleadosContactos->txt_mail_contacto ?></span></div>
						</div>
						<div class="col-md-4">
							<div class="col-md-6">
								<strong>Observaciones:</strong>
							</div>
							<div class="col-md-6"><span><?=$model->txt_observaciones?></span></div>
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
				<h3>Historial $</h3>
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
        		return Html::a(Utils::changeFormatDate($data->fch_pago),[
        			'empleados/pago-empleado-fecha',
        			'id' => $data->id_empleado,
        			'idPago' => $data->id_pago_empleado
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
