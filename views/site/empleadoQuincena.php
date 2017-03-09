<?php
use app\models\CatBancos;
use app\models\Utils;
use yii\helpers\Url;

$usuario = $empleado;
$totalExtra = 0;
$totalDeduccion = 0;
$totalNomina = 0;

$totalDeposito = 0;

$this->registerCssFile(
		'@web/css/empleadoTicket.css',
		['depends' => [\yii\web\JqueryAsset::className()]]
		);
?>


<!--alineacion de fila con class CONTAINER para el section-->
	<section class="row">

		<div class="col-md-8 col-md-offset-2">
			<div class="panel">
				<div class="panel-body">

					<div class="row">

						<aside class="col-xs-12 col-sm-4 col-md-4 izquierdo">
							<div>
								<img class="image1" src="<?=Url::base()?>/images/icono_foto.png" />

								<div class="nombre">
									<center>Nombre:</center>
									<p class="usuario text-primary"><?= $usuario->txt_nombre ?> </p>
									<div></div>
						
						</aside>
						<div class="col-xs-12 col-sm-7 col-md-8">

							<div class="row">
								<center>
									<h3 class="titulo">
										Datos Empleado<img class="pequenia" src="<?=Url::base()?>/images/recibo.png" />
									</h3>
								</center>

							</div>
							<h3 class="titulo1">Fijos</h3>
							<div class="row contenedor-datos">
								<div class="campos_formulario col-xs-12 col-sm-4 col-md-4">Dias
									trabajados</div>
								<div class="campos_formulario col-xs-12 col-sm-4 col-md-4">Dias mensuales</div>
								<div class="campos_formulario col-xs-12 col-sm-4 col-md-4">Subtotal:</div>
								<!--datos del input-->
								<div class="col-xs-12 col-sm-4 col-md-4">
									<div class="contenedor-valor"><?=$ultimoPago->num_dias_trabajados?></div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4">
									<div class="contenedor-valor"><?=round($ultimoPago->num_sueldo,2)?></div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-4">
									<div class="contenedor-valor"><?=round($ultimoPago->num_total_sueldo_fijo, 2)?></div>
								</div>
							</div>

							<h3>Extras</h3>

							<div class="row contenedor-datos">
							<?php
							foreach ( $extras as $ext ) {
								?>
							
							<div class="campos_formulario col-xs-8 col-sm-6 col-md-8">
									<?= $ext->txt_concepto?></div>
								<div class="col-xs-4 col-sm-6 col-md-4">
									<div class="contenedor-valor"><?= $ext->num_monto?round($ext->num_monto,2):'0'?></div>
									&nbsp;
								</div>
						
						
						<?php
								$totalExtra += $ext->num_monto;
							}
							?>
							
							</div>

							<h3>Menos</h3>

							<div class="row contenedor-datos">
							<?php
							
							foreach ( $deducciones as $ded ) {
								?>
								<div class="campos_formulario col-xs-8 col-sm-6 col-md-8">
									<?= $ded->txt_concepto?></div>

								<div class="col-xs-8 col-sm-6 col-md-4">
									<div class="contenedor-valor"><?= $ded->num_monto?round($ded->num_monto,2):'0'?></div>
									&nbsp;
								</div>
			
							<?php
								$totalExtra -= $ded->num_monto;
							}
							
							?>
								
							</div>


							<h3>Mas</h3>
							<div class="row contenedor-datos">
							
							<?php
							
							foreach ( $depositos as $dep ) {
								?>
	<div class="campos_formulario col-xs-8 col-sm-6 col-md-8">
									<?= $dep->txt_concepto?></div>
								<div class="col-xs-8 col-sm-6 col-md-4">
									<div class="contenedor-valor"><?= $dep->num_monto?round($dep->num_monto,2):'0'?></div>
								</div>
			<?php
								$totalDeposito += $dep->num_monto;
							}
							
							?>
							</div>


							<div class="row">
								<div class="contenedor-final col-xs-12 col-md-6">Original
									:<?=round(($totalExtra+$ultimoPago->num_total_sueldo_fijo),2)?></div>
								<div class="contenedor-final col-xs-6 col-md-6">Total
									:<?=round($totalDeposito,2)?></div>
							</div>


						</div>

					</div>


				</div>

			</div>
		</div>

	</section>
	<!--fin de section con filas row-->

	<!--definir clase clear para acomodo de la informaciòn despues de ingresarla-->
	<div class="clearflix visible-sm-block"></div>

</div>
<!--fin de la fila row-->
