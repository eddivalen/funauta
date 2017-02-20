<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Institucion */


	$this->title = 'Agregar Institucion';
	$this->params['breadcrumbs'][] = ['label' => 'Instituciones', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
	?>
	<div id="content-wrapper">
		<div class="institucion-create">

		    <?= $this->render('_form', [
		        'model' => $model, k]) ?>

		</div>
	</div>
