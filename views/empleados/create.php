<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleados */

$this->title = 'Create Ent Empleados';
$this->params['breadcrumbs'][] = ['label' => 'Ent Empleados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
