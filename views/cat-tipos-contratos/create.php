<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatTiposContratos */

$this->title = 'Create Cat Tipos Contratos';
$this->params['breadcrumbs'][] = ['label' => 'Cat Tipos Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cat-tipos-contratos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
