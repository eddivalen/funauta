<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\TratamientoSerch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Tratamientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tratamiento-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Crear Tratamiento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre_tratamiento',
            'indicaciones',
            'dosis',
            'posologia',
            [
                'attribute'=>'mto_id',
                'value'=>function($model){
                    return $model->mto->nombre;
                },
                'label'=>'Medicamento',
            ],
            [
                'attribute'=>'pte_cedula',
                'value'=>function($model){
                    return $model->pteCedula->nombre.' '.$model->pteCedula->apellido;
                },
                'label'=>'Paciente',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
