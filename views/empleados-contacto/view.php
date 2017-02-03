<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EntEmpleadosContactos */

$this->title = $model->id_empleado;
$this->params['breadcrumbs'][] = ['label' => 'Ent Empleados Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-empleados-contactos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_empleado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_empleado], [
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
            'id_empleado',
            'txt_telefono_contacto',
            'txt_mail_contacto',
        ],
    ]) ?>

</div>
