<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatNominas */

$this->title = $model->id_nomina;
$this->params['breadcrumbs'][] = ['label' => 'Cat Nominas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-nominas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_nomina], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_nomina], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_nomina',
            'txt_nombre',
            'txt_descripcion',
            'b_habilitado',
        ],
    ]) ?>

</div>
