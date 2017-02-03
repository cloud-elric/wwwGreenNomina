<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleadosContactos */

$this->title = 'Update Ent Empleados Contactos: ' . $model->id_empleado;
$this->params['breadcrumbs'][] = ['label' => 'Ent Empleados Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empleado, 'url' => ['view', 'id' => $model->id_empleado]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ent-empleados-contactos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
