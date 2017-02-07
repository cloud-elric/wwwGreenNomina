<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EntDatosBancarios */

$this->title = 'Update Ent Datos Bancarios: ' . $model->id_dato_bancario;
$this->params['breadcrumbs'][] = ['label' => 'Ent Datos Bancarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_dato_bancario, 'url' => ['view', 'id' => $model->id_dato_bancario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ent-datos-bancarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
