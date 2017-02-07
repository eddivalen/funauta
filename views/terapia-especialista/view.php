<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TerapiaEspecialista */

$this->title = $model->tpa_id;
$this->params['breadcrumbs'][] = ['label' => 'Terapia Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-especialista-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula], [
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
            'tpa_id',
            'eta_cedula',
            'pte_cedula',
        ],
    ]) ?>

</div>
