<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\ActRep */
$this->title = $model->rteCedula->nombre.' '.$model->rteCedula->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Actividades Representante', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="col-lg-4">
                             <h4>Actividades por representante</h4>
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
                        <div class="act-rep-view">
                            <?= DetailView::widget([
                                'model' => $model,
                                'attributes' => [
                                    [
                                        'attribute'=>'id',
                                        'label'=>'ID de Actividad',
                                    ], 
                                    [
                                        'attribute'=>'ate_id',
                                        'value'=>$model->ate->nombre_act,
                                        'label'=>'Nombre de la Actividad',
                                    ], 
                                    [
                                        'attribute'=>'rte_cedula',
                                        'label'=>'Cedula del Representante',
                                    ],
                                    [
                                        'value'=>$model->rteCedula->nombre.' '.$model->rteCedula->apellido ,
                                        'label'=>'Representante',
                                    ],
                                ],
                            ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
