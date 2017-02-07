<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HisTerapiasPaciente */

$this->title = 'Create His Terapias Paciente';
$this->params['breadcrumbs'][] = ['label' => 'His Terapias Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="his-terapias-paciente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
