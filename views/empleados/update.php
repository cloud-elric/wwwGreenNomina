<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = 'Actualizar Empleado: ' . $model->id_empleado;
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->txt_nombre, 'url' => ['view', 'id' => $model->id_empleado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ent-empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
