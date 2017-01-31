<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatNominas */

$this->title = 'Update Cat Nominas: ' . $model->id_nomina;
$this->params['breadcrumbs'][] = ['label' => 'Cat Nominas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_nomina, 'url' => ['view', 'id' => $model->id_nomina]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cat-nominas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
