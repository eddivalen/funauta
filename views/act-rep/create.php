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
<div class="act-rep-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
