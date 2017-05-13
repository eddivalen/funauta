<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Representante */
$this->title = 'Inscribir';
$this->params['breadcrumbs'][] = ['label' => 'Representantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
	            <div class="panel-heading">
	                   Formulario de actualización del representante
	            </div>
	            <div class="panel-body">
					<div class="representante-create">
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
