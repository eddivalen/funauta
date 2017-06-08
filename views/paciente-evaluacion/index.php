<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
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

            'fecha',
            [
                'attribute'=>'pte_cedula',
                'label'=>'Cedula del Paciente',
            ],
            [
                'attribute'=>'descripcion',
                'value'=>'pteCedula.nombre',
                'label'=>'Nombre del Paciente',
            ],
            [
                'attribute'=>'eta_cedula',
                'value'=>'etaCedula.nombre',
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
