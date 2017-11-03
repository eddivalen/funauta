<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\ActRepSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Actividades por Representante';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-rep-index">

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
                'value'=>'rteCedula.fullName',
                'label'=>'Representante',
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
