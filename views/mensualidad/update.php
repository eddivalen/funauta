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
<div class="mensualidad-update">
    <?= $this->render('_form', [
		'mensualidad'       => $mensualidad,
		'mensualidad_meses' => $mensualidad_meses,
    ]) ?>
</div>
