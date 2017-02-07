<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatNominas */

$this->title = 'Actualizar Nomina: ' . $model->id_nomina;
$this->params['breadcrumbs'][] = ['label' => 'Nominas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->txt_nombre, 'url' => ['view', 'id' => $model->id_nomina]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-nominas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
