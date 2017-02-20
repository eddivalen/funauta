<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Evaluacion */

$this->title = 'Create Evaluacion';
$this->params['breadcrumbs'][] = ['label' => 'Evaluacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluacion-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
