<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Historia */
$this->title = $model->tto->pteCedula->nombre.' '.$model->tto->pteCedula->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Historias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="col-lg-4">
                             <h4>Historia del Paciente</h4>
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
                    <div class="historia-view">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                 [
                                    'attribute' => 'fecha',
                                    'format' => ['date','php:d/m/Y']
                                ],
                                'observaciones',
                                [
                                    'attribute'=>'tto_id',
                                    'value'=>$model->tto->indicaciones,
                                    'label'=>'Indicaciones',
                                ], 
                                [
                                    'attribute'=>'tta_tpa_id',
                                    'value'=>$model->ttaTpa->tpa->descripcion,
                                    'label'=>'Terapia',
                                ], 
                                [
                                    'attribute'=>'tta_eta_cedula',
                                    'value'=>$model->ttaTpa->etaCedula->cedula,
                                    'label'=>'Cedula Especialista',
                                ],
                                [
                                    'value'=>$model->ttaTpa->etaCedula->nombre.' '.$model->ttaTpa->etaCedula->apellido,
                                    'label'=>'Especialista',
                                ], 
                                [
                                    'value'=>$model->tto->pteCedula->nombre.' '.$model->tto->pteCedula->apellido,
                                    'label'=>'Paciente',
                                ], 
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
