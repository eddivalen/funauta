<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoEspecialistaSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Especialistas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-especialista-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Asginar Especialidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
            'attribute'=>'eta_cedula',
            'label'=>'Cedula Especialista',
            ],
            [
            'attribute'=>'tpo_id',
            'value'=>'tpo.descripcion',
            'label'=>'Tipo de Especialista',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
