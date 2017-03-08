<?php
use app\models\CatBancos;
use app\models\Utils;

$this->params ['breadcrumbs'] [] = [
		'label' => 'Empleados',
		'url' => [
				'index'
		]
];
$this->params ['breadcrumbs'] [] = ['label' => $empleado->txt_nombre,
		'url' => [
				'empleados/'.$empleado->id_empleado
		]];

	$usuario = $empleado;


?>
<div class="panel">
<div class="panel-body">
<h2>Datos empleados</h2>
<table style="
    width: 100%;
">
	<tr>
		<th>No. empleado</th>
		<th>Nombre</th>
		<th>Rfc</th>
		<th>Seguro Social</th>
		<th>Fecha de alta</th>
		<th>Email</th>
	</tr>
	<tr>
		<?php 
		$usuario->fch_alta = Utils::changeFormatDate($usuario->fch_alta);
		?>
		<td><?= $usuario->num_empleado ?></td>
		<td><?= $usuario->txt_nombre ?></td>
		<td><?= $usuario->txt_rfc ?></td>
		<td><?= $usuario->num_seguro_social ?></td>
		<td><?= $usuario->fch_alta ?></td>
		<td><?= $usuario->entEmpleadosContactos->txt_mail_contacto ?></td>
	</tr>
</table>

<h2>Datos Bancarios</h2>
<table style="
    width: 100%;
">
	<tr>
		<th>Banco</th>
		<th>No. cuenta</th>
		<th>Clabe</th>
	</tr>
	<tr>
		<td><?php $banco = CatBancos::find()->where(['id_banco'=>$ultimoPago->id_banco])->one();
			echo $banco->txt_nombre;
			$datosBancarios = $usuario->entDatosBancarios;
		?></td>
		<td><?= $datosBancarios->txt_numero_cuenta ?></td>
		<td><?= $datosBancarios->txt_clabe ?></td>
	</tr>
</table>

<?php 
$totalExtra = 0;
$totalDeduccion = 0;
$totalNomina =0;

$totalDeposito = 0;
?>

<h2>Pago</h2>

<?php if($ultimoPago){
	$totalNomina = round($ultimoPago->num_total_sueldo_fijo , 2);
	?>
	
	<table style="
    width: 100%;
">
<tr>
<th>Días trabajados</th>
<th>Sueldo</th>
<th>Total</th>
</tr>
<tr>
<td><?=$ultimoPago->num_dias_trabajados?></td>
<td><?=round($ultimoPago->num_sueldo, 2)?></td>
<td><?=round($ultimoPago->num_total_sueldo_fijo, 2)?></td>
</tr>
</table>
	
	<?php 
}?>

<h2>Pagos extras</h2>
<table style="
    width: 100%;
">
<tr>
<td>Concepto</td>
<td>Monto</td>
</tr>
<?php 
$totalVariables = 0;
if(count($extras) >= 1){
				foreach($extras as $ext){
					$totalVariables +=$ext->num_monto;
			?>
					<tr>
						<td><?= $ext->txt_concepto?></td>
						<td><?= round($ext->num_monto, 2)?></td>
					</tr>
			<?php 
					$totalExtra += $ext->num_monto;
				}
			}else {		
			?>
			
			
<?php }?>			
<tr style="border-top:1px solid black"><td>Total variables</td><td><?=round($totalVariables,2)?></td></tr>
</table>

<h2>Deducciones</h2>
<table style="
    width: 100%;
">
<tr>
<td>Concepto</td>
<td>Monto</td>
</tr>
<?php

				foreach($deducciones as $ded){
			?>
					<tr>
						<td><?= $ded->txt_concepto?></td>
						<td><?= round($ded->num_monto, 2)?></td>
					</tr>
			<?php 
					$totalExtra -= $ded->num_monto;
				}
				
			?>
			
			
			

</table>


<h2>Depositos</h2>
<table style="
    width: 100%;
">
<tr>
<td>Concepto</td>
<td>Monto</td>
</tr>
<?php

				foreach($depositos as $dep){
			?>
					<tr>
						<td><?= $dep->txt_concepto?></td>
						<td><?= $dep->num_monto?></td>
					</tr>
			<?php 
					$totalDeposito+=$dep->num_monto;
				}
				
			?>
			
			
			

</table>

<h2>Total pagado: <?=round($totalExtra+$totalNomina, 2)?></h2>
<h2>Total depositado:<?=round($totalDeposito, 2)?></h2>
<!-- <table style="
    width: 100%;
">
	<tr>
		<th>Percepciones</th>
		<th>Deducciones</th>
	</tr>
	<tr>
		<table >
			<tr>
				<th>Concepto</th>
				<th>Monto</th>
			</tr>
			<?php if(count($extras) >= 1){
				foreach($extras as $ext){
			?>
					<tr>
						<td><?= $ext->txt_concepto?></td>
						<td><?= $ext->num_monto?></td>
					</tr>
			<?php 
					$totalExtra += $ext->num_monto;
				}
			}else if(count($extras) == 0){		
			?>
				<tr>
					<td></td>
					<td></td>
				</tr>
			<?php }else{?>
				<tr>
					<td><?= $extras->txt_concepto?></td>
					<td><?= $extras->num_monto?></td>
				</tr>
			<?php 
				$totalExtra += $extras->num_monto;
			}
			?>
			<tr>
				<td>Total</td>
				<td><?= $totalExtra ?></td>
			</tr>
		</table>
	</tr>
	<tr>
		<table>
			<tr>
				<th>Concepto</th>
				<th>Monto</th>
			</tr>
			<?php if(count($deducciones) > 1){
				foreach($deducciones as $decc){
			?>
					<tr>
						<td><?= $decc->txt_concepto?></td>
						<td><?= $decc->num_monto?></td>
					</tr>
			<?php 
					$totalDeduccion += $decc->num_monto;
				}
			}else if(Count($deducciones == 0)){
			?>
				<tr>
					<td></td>
					<td></td>
				</tr>
			<?php		
			}else{
			?>
				<tr>
					<td><?= $deducciones->txt_concepto?></td>
					<td><?= $deducciones->num_monto?></td>
				</tr>
			<?php 
				$totalDeduccion += $deducciones->num_monto;
			}
			?>
			<tr>
				<td>Total</td>
				<td><?= $totalDeduccion ?></td>
			</tr>
		</table>
	</tr>
</table> -->

</div>
</div>