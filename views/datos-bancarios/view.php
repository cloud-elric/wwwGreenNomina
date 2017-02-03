<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntDatosBancarios */

$this->title = $model->id_dato_bancario;
$this->params['breadcrumbs'][] = ['label' => 'Ent Datos Bancarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-datos-bancarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_dato_bancario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_dato_bancario], [
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
            'id_dato_bancario',
            'id_banco',
            'id_empleado',
            'txt_numero_cuenta:ntext',
            'txt_clabe:ntext',
            'b_habilitado',
        ],
    ]) ?>

</div>
