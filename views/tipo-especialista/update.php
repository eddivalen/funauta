<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\TipoEspecialista */
$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->etaCedula->nombre, 'url' => ['view', 'id' => $model->eta_cedula]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de asignar especialidad
            </div>
                <div class="panel-body">
					<div class="tipo-especialista-update">
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
