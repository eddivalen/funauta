<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\HisTerapiasPaciente;
use yii\grid\GridView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Paciente */
$this->title = $paciente->nombre.' '.$paciente->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-2">
                         <h4>Inscripción</h4>
                    </div>
                <p>
                <?= Html::a('Actualizar', ['update', 'id' => $paciente->cedula], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Eliminar', ['delete', 'id' => $paciente->cedula], [
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
                            'model' => $paciente,
                            'attributes' => [
                                [
                                    'attribute'=>'cedula',
                                    'label'=>'Cedula Paciente',
                                ], 
                                'nombre',
                                'apellido',
                                'fecha_nacimiento',
                                'lugar_nacimiento',
                                'edad',
                                'sexo',
                                [
                                    'attribute'=>'rte_cedula',
                                    'value'=>$paciente->rteCedula->cedula,
                                    'label'=>'Cedula Representante',
                                ], 
                                [
                                    'attribute'=>'rte_nombre',
                                    'value'=>$paciente->rteCedula->nombre.' '.$paciente->rteCedula->apellido,
                                    'label'=>'Representante',
                                ], 
                                [
                                    'attribute'=>'colegio',
                                    'value'=>$paciente->ico->nombre,
                                    'label'=>'Colegio',
                                ], 
                                [
                                    'attribute'=>'madre',
                                    'value'=>$paciente->nca->madre,
                                    'label'=>'Cantidad de Madre',
                                ], 
                                [
                                    'attribute'=>'padre',
                                    'value'=>$paciente->nca->padre,
                                    'label'=>'Cantidad de Padre',
                                ], 
                                [
                                    'attribute'=>'tias',
                                    'value'=>$paciente->nca->tias,
                                    'label'=>'Cantidad de Tias',
                                ], 
                                [
                                    'attribute'=>'tios',
                                    'value'=>$paciente->nca->tios,
                                    'label'=>'Cantidad de Tios',
                                ], 
                                [
                                    'attribute'=>'abuelos',
                                    'value'=>$paciente->nca->abuelo,
                                    'label'=>'Cantidad de Abuelos',
                                ], 
                                [
                                    'attribute'=>'otros',
                                    'value'=>$paciente->nca->otros,
                                    'label'=>'Otros Parientes',
                                ], 
                                [
                                    'attribute'=>'descripcion',
                                    'value'=>$paciente->nca->descripcion,
                                    'label'=>'Descripcion',
                                ], 
                            ],

                        ]) ?>
                        <h3>Terapias que ha recibido el paciente</h3>
                          <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'tiempo',
                                'descripcion',
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
