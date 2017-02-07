<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NucleoFamiliarSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nucleo Familiars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nucleo-familiar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Nucleo Familiar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'madre',
            'padre',
            'compmadre',
            'comppadre',
            'hermanos',
            'hermanas',
            'tias',
            'tios',
            'abuelo',
            'otros',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
