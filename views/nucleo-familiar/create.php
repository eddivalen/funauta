<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\NucleoFamiliar */

$this->title = 'Crear';
$this->params['breadcrumbs'][] = ['label' => 'Nucleo Familiar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nucleo-familiar-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
