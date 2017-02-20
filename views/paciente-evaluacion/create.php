<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\PacienteEvaluacion */

$this->title = 'Agregar Evaluacion del Paciente';
$this->params['breadcrumbs'][] = ['label' => 'Paciente Evaluacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-evaluacion-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
