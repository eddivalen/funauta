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
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="col-lg-4">
                             <h4>Terapia asignada a especialista</h4>
                        </div>
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
                </div>
                <div class="panel-body">
                    <div class="terapia-especialista-view">
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
                </div>
            </div>
        </div>
    </div>
</div>
    

