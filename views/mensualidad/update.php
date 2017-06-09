<?php
use yii\helpers\Html;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Mensualidad */
$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Mensualidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $mensualidad->id, 'url' => ['view', 'id' => $mensualidad->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                   Formulario para agregar pago
            </div>
                <div class="panel-body">
					<div class="mensualidad-update">
					    <?= $this->render('_form', [
							'mensualidad'       => $mensualidad,
							'mensualidad_meses' => $mensualidad_meses,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
