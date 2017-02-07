<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TratamientoSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tratamientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tratamiento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tratamiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'mto_id',
            'pte_cedula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
