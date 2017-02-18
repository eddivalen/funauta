<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = 'Inscribir Alumno';
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'paciente'    => $paciente,
		'institucion' => $institucion,
		'nucleo_fam'  => $nucleo_fam,
		'hisTerapias' => $hisTerapias,
    ]) ?>

</div>
