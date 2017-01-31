<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatSucursales */

$this->title = 'Create Cat Sucursales';
$this->params['breadcrumbs'][] = ['label' => 'Cat Sucursales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-sucursales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
