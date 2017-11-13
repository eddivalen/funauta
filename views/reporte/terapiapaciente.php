<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use p2made\helpers\FA;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Reporte';
$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-1">
    <p>
        <?= Html::a('PDF', ['terapiapaciente'],
        ['class' => 'btn btn-primary',
        'data'=>[
            'method' => 'post',
            'confirm' => '¿Estás seguro?',
            'params'=>[
                'get'       => json_encode(Yii::$app->request->get()),
            ],
        ],
        'target' => '_blank',  
        ]);?>
    </p> 
</div>
<h3>Terapias por paciente dado</h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute'=>'tpa_id',
                'value'=>function($model){
                    return $model->tpa->descripcion;
                },
                'label'=>'Terapia',
            ],
            [
                'attribute'=>'pte_cedula',
                'value'=>function($model){
                    return $model->pteCedula->nombre.' '.$model->pteCedula->apellido;
                },
                'label'=>'Paciente',
            ],
        ],
    ]); ?>



