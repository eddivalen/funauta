<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteEvaluacion */

$this->title = 'Update Paciente Evaluacion: ' . $model->fecha;
$this->params['breadcrumbs'][] = ['label' => 'Paciente Evaluacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fecha, 'url' => ['view', 'id' => $model->fecha]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paciente-evaluacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
