<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use app\models\HisTerapiasPaciente;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Paciente */

$this->title = $paciente->cedula;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $paciente->cedula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $paciente->cedula], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
                'value'=>$paciente->rteCedula->nombre,
                'label'=>'Nombre Representante',
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
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'pte_cedula',
                'label'=>'Cedula del Paciente',
            ],
            'tiempo',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
      <?= DetailView::widget([
        'model' => $hisTerapias,

        'attributes' => [
            [
                'attribute'=>'tiempo',
                'label'=>'Tiempo',
            ], 
            [
                'attribute'=>'descripcion',
                'label'=>'Descripcion',
            ], 
        ],
    ]) ?>


</div>
