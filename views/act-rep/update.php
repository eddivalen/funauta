<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\ActRep */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Actividad por Representes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rteCedula->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="act-rep-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
