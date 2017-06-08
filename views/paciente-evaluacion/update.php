<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\PacienteEvaluacion */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Paciente Evaluacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pteCedula->nombre, 'url' => ['view', 'id' => $model->fecha]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="paciente-evaluacion-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
