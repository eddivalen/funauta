<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

$this->title = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Actividades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividades-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
