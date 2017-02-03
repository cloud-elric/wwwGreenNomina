<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ViewEntDatosBancariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ent Datos Bancarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-datos-bancarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ent Datos Bancarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_dato_bancario',
            'id_banco',
            'id_empleado',
            'txt_numero_cuenta:ntext',
            'txt_clabe:ntext',
            // 'b_habilitado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
