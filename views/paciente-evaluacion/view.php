<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\PacienteEvaluacion */
$this->title = $model->pteCedula->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Paciente Evaluacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-evaluacion-view">
    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->fecha], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->fecha], [
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
            'fecha',
            [
                'attribute'=>'pte_cedula',
                'label'=>'Cedula del Paciente',
            ],
            [
                'value'=>$model->pteCedula->nombre.' '.$model->pteCedula->apellido,
                'label'=>'Paciente',
            ],
            [
                'attribute'=>'eta_cedula',
                'label'=>'Cedula del Especialista',
            ],
            [
                'value'=>$model->etaCedula->nombre.' '.$model->etaCedula->apellido,
                'label'=>'Especialista',
            ],
            'motivo',
            'descripcion',
        ],
    ]) ?>
</div>
