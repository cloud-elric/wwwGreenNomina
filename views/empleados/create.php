<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = 'Crear Empleado';
$this->params['breadcrumbs'][] = ['label' => 'Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-create">
<div class="panel panel-default">
<div class="panel-body">
<h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    	'model2' => $model2,
   		'model3' => $model3,
    ]) ?>
</div>
</div>
</div>