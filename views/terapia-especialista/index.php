<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TerapiaEspecialistaSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Terapia Especialistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="terapia-especialista-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Asignar Especialidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'tpa_id',
            'value'=>'tpa.descripcion',
            'label'=>'Terapia',
            ],
            [
            'attribute'=>'eta_cedula',
            'value'=>'etaCedula.cedula',
            'label'=>'Cedula Especialista',
            ],
            [
            'attribute'=>'eta_cedula',
            'value'=>'pteCedula.cedula',
            'label'=>'Cedula Paciente BUSQUEDAAAAAAAAAAAAAAA',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
