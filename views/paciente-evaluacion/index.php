<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
use kartik\date\DatePicker;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\PacienteEvaluacionSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Evaluacion del Paciente';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paciente-evaluacion-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'fecha',
                'value' => 'fecha',
                'options' => ['style' => 'width: 25%;'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha',
                    'pluginOptions'=>[
                        'format' => 'yyyy-m-d',
                    ],
                ]),
                'format' => ['date','php:d/m/Y'],
            ],
            [
                'attribute'=>'pte_cedula',
                'label'=>'Cedula del Paciente',
            ],
            [
                'attribute'=>'descripcion',
                'value'=>'pteCedula.fullName',
                'label'=>'Nombre del Paciente',
            ],
            [
                'attribute'=>'eta_cedula',
                'value'=>'etaCedula.fullName',
                'label'=>'Nombre del Especialista',
            ],
            [
                'attribute'=>'motivo',
                'label'=>'Diagnóstico',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
