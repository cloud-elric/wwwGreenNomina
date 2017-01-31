<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = 'Update Ent Empleados: ' . $model->id_empleado;
$this->params['breadcrumbs'][] = ['label' => 'Ent Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empleado, 'url' => ['view', 'id' => $model->id_empleado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ent-empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
