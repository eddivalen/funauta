<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use kartik\daterange\DateRangePicker;
$this->registerCssFile("../web/css/style.css");
p2made\theme\sbAdmin\assets\SBAdmin2Asset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\MensualidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Mensualidad';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensualidad-index">
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
                ]),
                'format' => ['date','php:d/m/Y']
            ],
            [
                'attribute'=>'banco',
                'filter' => array(
                    'Banco de Venezuela' => 'Banco de Venezuela', 
                    'Banco Bicentenario' => 'Banco Bicentenario', 
                    'Banesco'            => 'Banesco', 
                    'BOD' => 'BOD', 
                    'BBVA Provincial' => 'BBVA Provincial', 
                    'Banco Sofitasa' => 'Banco Sofitasa',
                    'Banco Mercantil' => 'Banco Mercantil', 
                    'Banco Exterior' => 'Banco Exterior', 
                    'BNC' => 'BNC', 
                    'Banco Fondo Común' => 'Banco Fondo Común',
                    'Banco Activo' => 'Banco Activo',
                    '100% Banco' => '100% Banco',
                ),
            ],
             [
                'attribute'=>'rte_cedula',
                'label'=>'Representante cedula',
            ],
            [
                'attribute'=>'rte_cedula',
                'value'=>'rteCedula.fullName',
                'label'=>'Representante',
                'filter'=> '',
            ],
            'monto',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>