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
<div class="paciente-view">


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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cedula',
            'nombre',
            'apellido',
            [
                'attribute'=>'fecha_nacimiento',
                'label'=>'Fecha de Nacimiento',
            ], 
            [
                'attribute'=>'lugar_nacimiento',
                'label'=>'Lugar de Nacimiento',
            ],
            'edad',
            'sexo',
            [
                'attribute'=>'rte_cedula',
                'label'=>'Cedula de Representante',
            ],
            [
                'attribute'=>'ico_id',
                'value'=>$model->ico->nombre,
                'label'=>'Nombre de la Institucion',
            ],
            [
                'attribute'=>'nca_id',
                'label'=>'ID de Nucleo Familiar',
            ],
        ],
    ]) ?>

</div>
