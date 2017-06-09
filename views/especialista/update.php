<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Especialista */
$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->cedula]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">Formulario de evaluación del paciente </div>
                <div class="panel-body">
					<div class="especialista-update">
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
