<?php

use yii\helpers\Html;

use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\HisTerapiasPaciente */

$this->title = 'Historial de terapias de pacientes';
$this->params['breadcrumbs'][] = ['label' => 'Historial Terapias Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="his-terapias-paciente-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
