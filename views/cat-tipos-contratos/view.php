<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatTiposContratos */

$this->title = $model->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tipos-contratos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_tipo_contrato], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_tipo_contrato], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro de que quiere eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_tipo_contrato',
            'txt_nombre',
            'txt_descripcion',
            //'b_habilitado',
        ],
    ]) ?>

</div>
