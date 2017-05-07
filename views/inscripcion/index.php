<?php

use yii\helpers\Html;
use yii\grid\GridView;
use p2made\helpers\FA;
$this->registerCssFile("../web/css/style.css");
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumno';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-index">
    <div class="row">
       <div class="col-md-1">
            <p>
                <?= Html::a('Inscripcion', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
       <div class="col-md-1 bt">
            <p>
                <?= Html::a('PDF', ['export'], ['class' => 'btn btn-danger']) ?>
            </p>
        </div>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cedula',
            'nombre',
            'apellido',
            [
                'attribute'=>'fecha_nacimiento',
                'label'=>'Fecha de Nacimiento',
            ],
            'lugar_nacimiento',
            'edad',
            'sexo',
             [
                'attribute'=>'rte_cedula',
                'label'=>'Representante cedula',
            ],
            [
                'attribute'=>'ico_id',
                'label'=>'Institución',
            ],
            [
                'attribute'=>'institucion',
                'label'=>'Institución',
                'value'=>'ico.nombre'
            ],
            'nca_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]); ?>
</div>
