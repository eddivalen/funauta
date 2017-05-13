<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\ActRep */

$this->title = 'Asignar Actividad';
$this->params['breadcrumbs'][] = ['label' => 'Actividad Representante', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
            <div class="panel-heading"> Formulario de asignación de actividades </div>
                <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="act-rep-form">
							<div class="act-rep-create">
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
</div>
