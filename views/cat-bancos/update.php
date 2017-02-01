<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatBancos */

$this->title = 'Actualizar Banco: ' . $model->id_banco;
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_banco, 'url' => ['view', 'id' => $model->id_banco]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="cat-bancos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
