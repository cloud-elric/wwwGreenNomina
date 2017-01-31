<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatNominas */

$this->title = 'Create Cat Nominas';
$this->params['breadcrumbs'][] = ['label' => 'Cat Nominas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-nominas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
