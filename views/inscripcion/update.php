<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $paciente app\pacientes\Paciente */

$this->title = 'Update Paciente: ' . $paciente->cedula;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $paciente->cedula, 'url' => ['view', 'id' => $paciente->cedula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paciente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'paciente'    => $paciente,
		'nucleo_fam'  => $nucleo_fam,
		'hisTerapias' => $hisTerapias,
    ]) ?>

</div>
