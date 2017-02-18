<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NucleoFamiliar */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Nucleo Familiar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nucleo-familiar-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute'=>'id',
                'label'=>'ID de Nucleo Familiar',
            ], 
            [ 
                'attribute'=>'madre',
                'label'=>'Cantidad de Madres',
            ], 
            [
                'attribute'=>'padre',
                'label'=>'Cantidad de Padres',
            ], 
            [
                'attribute'=>'compmadre',
                'value'=>$model->compmadre,
                'label'=>'Compañero de Madre',
            ],
            [
                'attribute'=>'comppadre',
                'value'=>$model->comppadre,
                'label'=>'Compañero de Padre',
            ], 
            [
                'attribute'=>'tias',
                'label'=>'Cantidad de Tias',
            ], 
            [
                'attribute'=>'tios',
                'label'=>'Cantidad de Tios',
            ], 
            [
                'attribute'=>'abuelo',
                'label'=>'Cantidad de Abuelos',
            ], 
            [
                'attribute'=>'otros',
                'label'=>'Otros Parientes',
            ], 
            [
                'attribute'=>'descripcion',
                'label'=>'Descripcion',
            ], 
        ],
    ]) ?>

</div>
