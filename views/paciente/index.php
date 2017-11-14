<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
use kartik\date\DatePicker;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pacientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-index">

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cedula',
            'nombre',
            'apellido',
            [
                'attribute' => 'fecha_nacimiento',
                'value' => 'fecha_nacimiento',
                'options' => ['style' => 'width: 25%;'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_nacimiento',
                    'pluginOptions'=>[
                        'format' => 'yyyy-m-d',
                    ],
                ]),
                'format' => ['date','php:d/m/Y'],
            ],
            [
                'attribute'=>'lugar_nacimiento',
                'label'=>'Lugar de Nacimiento',
            ],
            // 'edad',
            // 'sexo',
            // 'rte_cedula',
            // 'ico_id',
            // 'nca_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

</div>
