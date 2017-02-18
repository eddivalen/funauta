<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActRepSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividades por Representante';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-rep-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Asignar Actividad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'ate_id',
                'value'=>'ate.nombre_act',
                'label'=>'Actividad',
            ],
            [
                'attribute'=>'rte_cedula',
                'value'=>'rteCedula.nombre',
                'label'=>'Nombre',
            ],
            [
                'attribute'=>'id',
                'value'=>'rte_cedula',
                'label'=>'Cedula',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
