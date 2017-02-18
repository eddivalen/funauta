<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PacienteEvaluacion */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Paciente Evaluacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pteCedula->nombre, 'url' => ['view', 'id' => $model->fecha]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="paciente-evaluacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
