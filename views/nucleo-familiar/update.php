<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NucleoFamiliar */

$this->title = 'Update Nucleo Familiar: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nucleo Familiars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nucleo-familiar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
