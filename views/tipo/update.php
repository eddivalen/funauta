<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Tipo */
$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->descripcion, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
        	<div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de tipo de especialidad
            </div>
            	<div class="panel-body">
					<div class="tipo-update">
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
