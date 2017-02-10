<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CatSucursales;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = $extra->txt_concepto;
$this->params['breadcrumbs'][] = ['label' => 'Pagos extras', 'url' => ['agregar-pago?id='.$extra->id_empleado.'&idPago='.$extra->id_nomina]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update-pago-extra', 'id' => $extra->id_pago_extra], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete-pago-extra', 'id' => $extra->id_pago_extra], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de que quieres eleminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $extra,
        'attributes' => [
        	'txt_concepto',
        	'num_monto'
        ],
    ])?>

</div>
