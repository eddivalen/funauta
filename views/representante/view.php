<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use p2made\helpers\FA;

p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\Representante */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Representantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representante-view">


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
            'nacionalidad',
            'edad',
            'edo_civil',
            'direccion',
            'telefono_local',
            'telefono_celular',
            'correo',
            'ocupacion',
            'empresa',
            'horario_trabajo',
            'actividad',
            'disponibilidad',
            'nivel_socioeconomico',
        ],
    ]) ?>

</div>
