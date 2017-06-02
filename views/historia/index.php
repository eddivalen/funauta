<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\HistoriaSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historia-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Historia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fecha',
            'observaciones',
            [
                'attribute'=>'tto_id',
                'label'=>'Tratamiento',
            ],
            [
                'attribute'=>'tta_tpa_id',
                'label'=>'Terapia',
            ],
            [
                'attribute'=>'tta_eta_cedula',
                'value'=>'ttaTpa.etaCedula.nombre',
                'label'=>'Especialista',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
