<?php

use yii\helpers\Html;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\TerapiaEspecialista */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Terapia Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pteCedula->nombre, 'url' => ['view', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="terapia-especialista-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
