<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = $model->id_empleado;
$this->params['breadcrumbs'][] = ['label' => 'Ent Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_empleado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_empleado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_empleado',
            'id_sucursal',
            'id_tipo_contrato',
            'id_nomina',
            'txt_nombre',
            'txt_observaciones:ntext',
            'txt_rfc',
            'num_empleado',
            'num_seguro_social',
            'fch_alta',
            'fch_baja',
            'b_habilitado',
        ],
    ]) ?>

</div>
