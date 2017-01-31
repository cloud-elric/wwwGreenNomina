<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntEmpleadosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ent Empleados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ent Empleados', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_empleado',
            'id_sucursal',
            'id_tipo_contrato',
            'id_nomina',
            'txt_nombre',
            // 'txt_observaciones:ntext',
            // 'txt_rfc',
            // 'num_empleado',
            // 'num_seguro_social',
            // 'fch_alta',
            // 'fch_baja',
            // 'b_habilitado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
