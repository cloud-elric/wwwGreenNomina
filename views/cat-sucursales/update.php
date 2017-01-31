<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatSucursales */

$this->title = 'Update Cat Sucursales: ' . $model->id_sucursal;
$this->params['breadcrumbs'][] = ['label' => 'Cat Sucursales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sucursal, 'url' => ['view', 'id' => $model->id_sucursal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-sucursales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
