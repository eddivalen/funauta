<?php

use yii\helpers\Html;
use yii\grid\GridView;
use p2made\helpers\FA;

p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alumno';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Inscripcion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
            'rte_cedula',
            'ico_id',
            'nca_id',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
        
    ]); ?>
</div>
