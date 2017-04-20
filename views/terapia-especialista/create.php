<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

$this->title = 'Asignar terapia a especialista';
$this->params['breadcrumbs'][] = ['label' => 'Terapia Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-especialista-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
