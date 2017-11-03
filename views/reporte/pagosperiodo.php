<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use app\models\Representante;
use app\models\Pagosperiodo;
use p2made\helpers\FA;
use kartik\field\FieldRange;
use yii\helpers\ArrayHelper;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Pagos';
$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-1">
    <p>
        <?= Html::a('PDF', ['pagosperiodo'],
        ['class' => 'btn btn-primary',
        'data'=>[
            'method' => 'post',
            'confirm' => '¿Estás seguro?',
            'params'=>[
                'get'       => json_encode(Yii::$app->request->get()),
            ],
        ], 
        ]);?>
    </p> 
</div>
<h4>Listado de todos los pagos para un periodo de fecha dado</h4>
  <br>
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        'id_pago',
        [
            'attribute' => 'rango_fecha',
            'value' => 'fecha',
            'format'=>'raw',
            'format' => ['date','php:d/m/Y'],
            'options' => ['style' => 'width: 25%;'],
            'filter' => DateRangePicker::widget([
                'model' => $searchModel,
                'attribute' => 'rango_fecha',
                'useWithAddon'=>false,
                'convertFormat'=>true,
                'pluginOptions'=>[
                    'locale'=>['format'=>'Y-m-d']
                ],
            ])
        ],
        'banco',
        [
            'attribute'=>'rte_cedula',
            'value'=>function($model){
                return $model->rteCedula->nombre.' '.$model->rteCedula->apellido;
            },
            'label'=>'Representante',
        ],
        [
                'attribute' =>'rte_cedula',
                'label'     =>'Cedula',
                'filter'    => ''
        ],
        'monto',
    ],
]); ?>




