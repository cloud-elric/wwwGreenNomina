<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatTiposContratos */

$this->title = 'Update Cat Tipos Contratos: ' . $model->id_tipo_contrato;
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_contrato, 'url' => ['view', 'id' => $model->id_tipo_contrato]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-tipos-contratos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
