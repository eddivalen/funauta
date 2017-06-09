<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\TipoEspecialista */
$this->title = $model->etaCedula->nombre.' '.$model->etaCedula->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Especialistas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="col-lg-4">
                             <h4>Asginar tipo a especialista</h4>
                        </div>
                        <p>
                            <?= Html::a('Actualizar', ['update', 'id' => $model->eta_cedula], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Eliminar', ['delete', 'id' => $model->eta_cedula], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => '¿Está seguro de eliminar este elemento?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                </div>
                <div class="panel-body">
                    <div class="tipo-especialista-view">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                [
                                    'attribute' => 'eta_cedula',
                                    'value'     =>$model->etaCedula->nombre.' '.$model->etaCedula->apellido,
                                    'label'     =>'Especialista',
                                ], 
                                [
                                    'attribute' => 'tpo_id',
                                    'value'     =>$model->tpo->descripcion,
                                    'label'     =>'Tipo de especialidad',
                                ], 
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
