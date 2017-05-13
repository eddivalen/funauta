<?php
use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\HistorialTerapias */
$this->title = 'Create Historial Terapias';
$this->params['breadcrumbs'][] = ['label' => 'Historial Terapias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historial-terapias-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
