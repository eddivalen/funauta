<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\NucleoFamiliar */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Nucleo Familiar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="nucleo-familiar-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
