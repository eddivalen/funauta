<?php

use yii\helpers\Html;
use yii\grid\GridView;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\NivelSocioeconomicoSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nivel Socioeconomicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nivel-socioeconomico-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nivel Socioeconomico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'vivienda',
            'transporte',
            'ingresos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
