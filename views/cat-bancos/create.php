<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatBancos */

$this->title = 'Create Cat Bancos';
$this->params['breadcrumbs'][] = ['label' => 'Cat Bancos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-bancos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
