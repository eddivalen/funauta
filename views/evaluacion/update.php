<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Evaluacion */

$this->title = 'Update Evaluacion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Evaluacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evaluacion-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
