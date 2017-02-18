<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NucleoFamiliarSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nucleo Familiar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nucleo-familiar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'madre',
            'padre',
            [
                'attribute'=>'compmadre',
                'label'=>'Compañero de Madre',
            ],
            [
                'attribute'=>'comppadre',
                'label'=>'Compañero de Padre',
            ],    
            // 'hermanos',
            // 'hermanas',
            // 'tias',
            // 'tios',
            // 'abuelo',
            // 'otros',
            // 'descripcion',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
