<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Terapia Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pteCedula->nombre, 'url' => ['view', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de asignar terapia a especialista
            </div>
                <div class="panel-body">
					<div class="terapia-especialista-update">
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>