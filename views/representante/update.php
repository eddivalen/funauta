<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Representante */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Representantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cedula, 'url' => ['view', 'id' => $model->cedula]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
	            <div class="panel-heading">
	                   Formulario de inscripción del representante
	            </div>
	            <div class="panel-body">
					<div class="representante-update">
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>