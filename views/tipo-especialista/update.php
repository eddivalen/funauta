<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoEspecialista */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->etaCedula->nombre, 'url' => ['view', 'id' => $model->eta_cedula]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tipo-especialista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
