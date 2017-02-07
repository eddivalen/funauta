<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaEspecialista */

$this->title = 'Update Terapia Especialista: ' . $model->tpa_id;
$this->params['breadcrumbs'][] = ['label' => 'Terapia Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tpa_id, 'url' => ['view', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terapia-especialista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>