<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HisTerapiasPaciente */

$this->title = 'Update His Terapias Paciente: ' . $model->pte_cedula;
$this->params['breadcrumbs'][] = ['label' => 'His Terapias Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pte_cedula, 'url' => ['view', 'pte_cedula' => $model->pte_cedula, 'hpa_id' => $model->hpa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="his-terapias-paciente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
