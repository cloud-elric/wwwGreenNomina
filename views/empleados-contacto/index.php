<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntEmpleadosContactoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ent Empleados Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-contactos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ent Empleados Contactos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_empleado',
            'txt_telefono_contacto',
            'txt_mail_contacto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
