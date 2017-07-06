<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Tratamiento */
$this->title = $model->pteCedula->nombre.' '.$model->pteCedula->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Tratamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="col-lg-2">
                             <h4>Tratamiento</h4>
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
                    <div class="tratamiento-view">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'id',
                                'nombre_tratamiento',
                                'indicaciones',
                                'dosis',
                                'posologia',
                                [
                                    'attribute'=>'mto_id',
                                    'value'=>function($model){
                                        return $model->mto->nombre;
                                    },
                                    'label'=>'Medicamento',
                                ],
                                [
                                    'attribute'=>'pte_cedula',
                                    'label'=>'Cedula Paciente',
                                ],
                                [
                                    'value'=>$model->pteCedula->nombre.' '.$model->pteCedula->apellido ,
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
