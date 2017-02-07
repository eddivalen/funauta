<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HisTerapiasPaciente */

$this->title = $model->pte_cedula;
$this->params['breadcrumbs'][] = ['label' => 'His Terapias Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="his-terapias-paciente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pte_cedula' => $model->pte_cedula, 'hpa_id' => $model->hpa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pte_cedula' => $model->pte_cedula, 'hpa_id' => $model->hpa_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pte_cedula',
            'hpa_id',
            'tiempo',
        ],
    ]) ?>

</div>
