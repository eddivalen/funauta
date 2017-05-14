<?php
use yii\helpers\Html;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Users */
$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
	            <div class="panel-heading">
	                   Formulario de actualización
	            </div>
	            <div class="panel-body">
					<div class="users-create">
					    <?= $this->render('_form', [
					        'model' => $model,
					    ]) ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
