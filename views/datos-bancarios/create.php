<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EntDatosBancarios */

$this->title = 'Create Ent Datos Bancarios';
$this->params['breadcrumbs'][] = ['label' => 'Ent Datos Bancarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ent-datos-bancarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
