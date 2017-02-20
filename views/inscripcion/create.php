<?php

use yii\helpers\Html;
use p2made\helpers\FA;

p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = 'Inscribir Alumno';
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-create">


    <?= $this->render('_form', [
		'paciente'    => $paciente,
		'institucion' => $institucion,
		'nucleo_fam'  => $nucleo_fam,
		'hisTerapias' => $hisTerapias,
    ]) ?>

</div>
