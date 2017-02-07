<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HisTerapiasPacienteSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'His Terapias Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="his-terapias-paciente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create His Terapias Paciente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pte_cedula',
            'hpa_id',
            'tiempo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
