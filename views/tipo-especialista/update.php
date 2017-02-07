<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoEspecialista */

$this->title = 'Update Tipo Especialista: ' . $model->eta_cedula;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->eta_cedula, 'url' => ['view', 'id' => $model->eta_cedula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-especialista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
