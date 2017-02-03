<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleadosContactos */

$this->title = 'Create Ent Empleados Contactos';
$this->params['breadcrumbs'][] = ['label' => 'Ent Empleados Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-contactos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
