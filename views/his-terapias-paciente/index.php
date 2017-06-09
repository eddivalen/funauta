<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\HisTerapiasPacienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historial de terapias del paciente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="his-terapias-paciente-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar Historia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
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
    <?php Pjax::end(); ?>

</div>
