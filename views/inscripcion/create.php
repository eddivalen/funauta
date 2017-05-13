<?php
use yii\helpers\Html;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
$this->title = 'Inscribir Alumno';
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-create">
	<div class="body-content">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                   Formulario de Inscripción
	                </div>
	                <div class="panel-body">
					    <?= $this->render('_form', [
							'paciente'    => $paciente,
							'institucion' => $institucion,
							'nucleo_fam'  => $nucleo_fam,
							'hisTerapias' => $hisTerapias,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

