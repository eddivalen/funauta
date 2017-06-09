<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $paciente app\pacientes\Paciente */
$this->title = 'Actualizar Paciente: ' . $paciente->cedula;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $paciente->cedula, 'url' => ['view', 'id' => $paciente->cedula]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Formulario de Inscripción
                </div>
                <div class="panel-body">
					<div class="paciente-update">
					    <?= $this->render('_form', [
							'paciente'    => $paciente,
							'nucleo_fam'  => $nucleo_fam,
							'hisTerapias' => $hisTerapias,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
