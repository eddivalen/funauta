<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Institucion */
$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Instituciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
        	<div class="panel panel-default">
            <div class="panel-heading">
                   Formulario de instituciones
            </div>
            	<div class="panel-body">
					<div id="content-wrapper">
						<div class="institucion-update">

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

