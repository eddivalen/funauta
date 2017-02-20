<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\HisTerapiasPaciente */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Historial Terapias Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pteCedula->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="his-terapias-paciente-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
