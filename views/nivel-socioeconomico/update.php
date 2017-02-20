<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\NivelSocioeconomico */

$this->title = 'Update Nivel Socioeconomico: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nivel Socioeconomicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nivel-socioeconomico-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
