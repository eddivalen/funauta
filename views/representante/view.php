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
<div class="body-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="col-lg-2">
                     <h4>Representante</h4>
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
                <div class="representante-view">
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
            </div>
            </div>
        </div>
    </div>
</div>