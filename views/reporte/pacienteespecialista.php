<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use p2made\helpers\FA;
use kartik\field\FieldRange;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Reporte';
$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-1">
    <p>
        <?= Html::a('PDF', ['pacienteespecialista'],
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
<h3>Listado de pacientes atendidos por terapista</h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'attribute'=>'tta_eta_cedula',
                'value'=>function($model){
                    return $model->ttaTpa->etaCedula->nombre.' '.$model->ttaTpa->etaCedula->apellido;
                },
                'label'=>'Especialista',
            ],
            [
                'value'=>function($model){
                    return $model->ttaTpa->pteCedula->nombre.' '.$model->ttaTpa->pteCedula->apellido;
                },
                'label'=>'Paciente',
            ],
        ],
    ]); ?>



