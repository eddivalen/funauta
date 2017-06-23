<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\daterange\DateRangePicker;
use yii\helpers\ArrayHelper;
use app\models\Representante;
use app\models\MensualidadMeses;
use app\models\Pagosperiodo;
use p2made\helpers\FA;
use kartik\field\FieldRange;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
$this->title = 'Pagos';
$this->params['breadcrumbs'][] = ['label' => 'Reportes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h3>Listado de todos los pagos para un periodo de fecha dado</h3>
<?php
    Modal::begin([
            'header' =>'<h4>Branches</h4>',
            'id'     =>'modal',
            'size'   =>'modal-lg',
        ]);
    echo "<div id='modelContent'></div>";
    Modal::end();
 ?>
<?php 
    $exportConfig = [
        ExportMenu::FORMAT_CSV => [
        'label' => 'CSV',
        'icon' =>'file-code-o',
        'iconOptions' => ['class' => 'text-primary'],
        'linkOptions' => [],
        'options' => ['title' => 'title'],
        'alertMsg' => 'export',
        'mime' => 'application/csv',
        'extension' => 'csv',
        'writer' => 'CSV'
        ],
    ];
$gridcolumns = [
    'id_pago',
    'rango_fecha',
    'banco',
    'rte_cedula',
];

echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns'      => $gridcolumns
    ]);
?>
<?php Pjax::begin(); ?>
 
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pjax' => true,
    'columns' => [
        ['class' => 'kartik\grid\SerialColumn'],
        'id_pago',
        [
            'attribute' => 'rango_fecha',
            'value' => 'fecha',
            'format'=>'raw',
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
        'rte_cedula',
    ],
]); ?>
 <?php Pjax::end(); ?>




