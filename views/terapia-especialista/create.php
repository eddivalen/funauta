<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TerapiaEspecialista */

$this->title = 'Create Terapia Especialista';
$this->params['breadcrumbs'][] = ['label' => 'Terapia Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-especialista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>