<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
$this->title = $model->cedula;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="col-lg-4">
                             <h4>Paciente</h4>
                        </div>
                        <p>
                            <?= Html::a('Actualizar', ['update', 'id' => $model->cedula], ['class' => 'btn btn-primary']) ?>
                            <?= Html::a('Eliminar', ['delete', 'id' => $model->cedula], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => '¿Está seguro de eliminar este elemento?',
                                    'method' => 'post',
                                ],
                            ]) ?>
                        </p>
                </div>
                <div class="panel-body">
                    <div class="paciente-view">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                [
                                    'attribute'=>'cedula',
                                    'label'=>'Cedula Paciente',
                                ], 
                                'nombre',
                                'apellido',
                                [
                                    'attribute'=>'fecha_nacimiento',
                                    'label'=>'Fecha de Nacimiento',
                                    'format' => ['date','php:d/m/Y'],
                                ],
                                'lugar_nacimiento',
                                'edad',
                                'sexo',
                                [
                                    'attribute'=>'rte_cedula',
                                    'value'=>$model->rteCedula->cedula,
                                    'label'=>'Cedula Representante',
                                ], 
                                [
                                    'attribute'=>'rte_nombre',
                                    'value'=>$model->rteCedula->nombre.' '.$model->rteCedula->apellido,
                                    'label'=>'Representante',
                                ], 
                                [
                                    'attribute'=>'colegio',
                                    'value'=>$model->ico->nombre,
                                    'label'=>'Colegio',
                                ], 
                                [
                                    'attribute'=>'madre',
                                    'value'=>$model->nca->madre,
                                    'label'=>'Cantidad de Madre',
                                ], 
                                [
                                    'attribute'=>'padre',
                                    'value'=>$model->nca->padre,
                                    'label'=>'Cantidad de Padre',
                                ], 
                                [
                                    'attribute'=>'tias',
                                    'value'=>$model->nca->tias,
                                    'label'=>'Cantidad de Tias',
                                ], 
                                [
                                    'attribute'=>'tios',
                                    'value'=>$model->nca->tios,
                                    'label'=>'Cantidad de Tios',
                                ], 
                                [
                                    'attribute'=>'abuelos',
                                    'value'=>$model->nca->abuelo,
                                    'label'=>'Cantidad de Abuelos',
                                ], 
                                [
                                    'attribute'=>'otros',
                                    'value'=>$model->nca->otros,
                                    'label'=>'Otros Parientes',
                                ], 
                                [
                                    'attribute'=>'descripcion',
                                    'value'=>$model->nca->descripcion,
                                    'label'=>'Descripcion',
                                ], 
                            ],

                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
