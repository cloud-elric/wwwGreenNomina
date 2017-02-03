<?php
use app\models\CatBancos;

$count_tabla = count($empleado);
$usuario = null;
if($count_tabla >= 1){
	foreach($empleado as $emp){
		$usuario = $emp;
		break;
	}
}else{
	$usuario = $empleado;
}

?>
<h2>Datos empleados</h2>
<table>
	<tr>
		<th>No. empleado</th>
		<th>Nombre</th>
		<th>Rfc</th>
		<th>Seguro Social</th>
		<th>Fecha de alta</th>
		<th>Email</th>
	</tr>
	<tr>
		<td><?= $usuario->num_empleado ?></td>
		<td><?= $usuario->txt_nombre ?></td>
		<td><?= $usuario->txt_rfc ?></td>
		<td><?= $usuario->num_seguro_social ?></td>
		<td><?= $usuario->fch_alta ?></td>
		<td><?= $usuario->txt_mail_contacto ?></td>
	</tr>
</table>

<h2>Datos Bancarios</h2>
<table>
	<tr>
		<th>Banco</th>
		<th>No. cuenta</th>
		<th>Clabe</th>
	</tr>
	<tr>
		<td><?php $banco = CatBancos::find()->where(['id_banco'=>$usuario->dba_nombre])->one();
			echo $banco->txt_nombre;
		?></td>
		<td><?= $usuario->txt_numero_cuenta ?></td>
		<td><?= $usuario->txt_clabe ?></td>
	</tr>
</table>

<?php 
$totalExtra = 0;
$totalDeduccion = 0;
?>

<h2>Pago</h2>
<table>
	<tr>
		<th>Percepciones</th>
		<th>Deducciones</th>
	</tr>
	<tr>
		<table>
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
			}else {		
			?>
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
</table>

