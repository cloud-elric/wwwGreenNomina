<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CatTiposContratosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cat Tipos Contratos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tipos-contratos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cat Tipos Contratos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipo_contrato',
            'txt_nombre',
            'txt_descripcion',
            'b_habilitado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
