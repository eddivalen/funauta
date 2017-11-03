<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\PacienteEvaluacion */
$this->title = $model->pteCedula->nombre.' '.$model->pteCedula->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Paciente Evaluacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-3">
                         <h4>Evaluacion del paciente</h4>
                    </div>
                    <p>
                        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '¿Está seguro de eliminar este elemento?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    </div>
                    <div class="panel-body">
                    <div class="paciente-evaluacion-view">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                     [
                                        'attribute' => 'fecha',
                                        'format' => ['date','php:d/m/Y']
                                    ],
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
                </div>
            </div>
        </div>
    </div>
</div>
