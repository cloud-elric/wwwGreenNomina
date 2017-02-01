<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatTiposContratos */

$this->title = 'Actualizar Contrato: ' . $model->id_tipo_contrato;
$this->params['breadcrumbs'][] = ['label' => 'Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->txt_nombre, 'url' => ['view', 'id' => $model->id_tipo_contrato]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-tipos-contratos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
