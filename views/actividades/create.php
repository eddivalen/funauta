<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
	<div class="row">
	    <div class="col-lg-8">
	    	<div class="panel panel-default">
	            <div class="panel-heading">
	                   Formulario de actividades
	            </div>
	            <div class="panel-body">
		            <div class="row">
		            	<div class="col-lg-8">
							<div class="actividades-create">
								    <?= $this->render('_form', [
								        'model' => $model,
								    ]) ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



