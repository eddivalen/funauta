<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Historia */
$this->title = 'Crear Historia';
$this->params['breadcrumbs'][] = ['label' => 'Historias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
        <div class="panel panel-default">
            <div class="panel-heading"> Formulario de historia </div>
                <div class="panel-body">
				<div class="historia-create">
					    <?= $this->render('_form', [
					        'model' => $model,
					]) ?>
				</div>
			</div>
		</div>
</div>