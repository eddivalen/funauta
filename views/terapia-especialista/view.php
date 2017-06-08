<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\TerapiaEspecialista */

$this->title = $model->tpa->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Terapia Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-especialista-view">
    <p>
        <?= Html::a('Actualizar', ['update', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'tpa_id' => $model->tpa_id, 'eta_cedula' => $model->eta_cedula], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
            'attribute'=>'tpa_id',
            'value'=>$model->tpa->descripcion,
            'label'=>'Terapia',
            ],
            [
            'attribute'=>'eta_cedula',
            'value'=>$model->etaCedula->cedula,
            'label'=>'Cedula Especialista',
            ],
            [
            'value'=>$model->etaCedula->nombre.' '.$model->etaCedula->apellido,
            'label'=>'Especialista',
            ],
            [
            'attribute'=>'eta_cedula',
            'value'=>$model->pteCedula->cedula,
            'label'=>'Cedula Paciente',
            ],
            [
            'value'=>$model->pteCedula->nombre.' '.$model->pteCedula->apellido,
            'label'=>'Paciente',
            ],
        ],
    ]) ?>
</div>
