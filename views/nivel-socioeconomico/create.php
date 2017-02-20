<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\NivelSocioeconomico */

$this->title = 'Create Nivel Socioeconomico';
$this->params['breadcrumbs'][] = ['label' => 'Nivel Socioeconomico', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-socioeconomico-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
