<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HistoriaSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Historia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
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
                'value'=>'TtaTpa.nombre',
                'label'=>'Especialista',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
