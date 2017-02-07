<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatBancos */

$this->title = 'Crear Banco';
$this->params['breadcrumbs'][] = ['label' => 'Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-bancos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
