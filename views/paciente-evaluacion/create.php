<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PacienteEvaluacion */

$this->title = 'Agregar Evaluacion del Paciente';
$this->params['breadcrumbs'][] = ['label' => 'Paciente Evaluacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-evaluacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
