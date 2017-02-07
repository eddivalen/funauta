<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Representante */

$this->title = 'Update Representante: ' . $model->cedula;
$this->params['breadcrumbs'][] = ['label' => 'Representantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cedula, 'url' => ['view', 'id' => $model->cedula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="representante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
